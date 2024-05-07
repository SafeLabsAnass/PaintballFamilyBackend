<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use stdClass;

class DashboardController extends Controller
{
   function statistics(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
   {
       $items = new stdClass();
       $items->categories = Category::all()->count();
       $items->sales = Sale::all()->count();
       $items->products = Product::all()->count();
       $topSellingProduct = SaleProduct::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
           ->groupBy('product_id')
           ->orderByDesc('total_quantity')
           ->first();

       $productId = $topSellingProduct->product_id;
       $totalQuantity = $topSellingProduct->total_quantity;
       $topProduct = Product::find($productId);
       $topSellingPaymentMethod = Sale::select('payment_id', DB::raw('SUM(payment_id) as total_payment'))
           ->groupBy('payment_id')
           ->orderByDesc('total_payment')
           ->get();
       $topSellingCounts = Sale::select('created_at', DB::raw('COUNT(DATE_FORMAT(created_at,"%Y-%d-%M")) as total_sale'))
           ->groupBy('created_at')
           ->orderByDesc('total_sale')
           ->get();
       $listPayments = [];
       $sum = 0;
       foreach ($topSellingPaymentMethod as $item) {
           $sum += $item->total_payment;
       }
       $listDays = [];
       foreach ($topSellingCounts as $topSellingCount) {
           $date = Carbon::parse($topSellingCount->created_at);
           $listDays [] = [
               'days'=>$date->format('d M'),
                ];
       }
       $listCount = [];
       foreach ($topSellingCounts as $topSellingCount) {
           $listCount [] = [
               'counts'=>$topSellingCount->total_sale,
           ];
       }
       foreach ($topSellingPaymentMethod as $payment) {
           $listPayments [] = ['paymentId'=>$payment->payment_id,
               'totalPayment'=>$payment->total_payment,
               'payment'=>Payment::find($payment->payment_id),
               'percent'=>round($payment->total_payment/$sum,2)*100];
       }
       $items->paymentsStatistics = $listPayments;
       $items->lineChart = [$listDays, $listCount];
       $items->topProduct = ['product'=>$topProduct->name,'times'=>$totalQuantity];
       return view('pages.dashboard')->with('items',$items);
   }
   function charts(): \Illuminate\Http\JsonResponse
   {
       $items = new stdClass();
       $currentMonth = Carbon::now()->month;
       $currentYear = Carbon::now()->year;
       $topSellingCounts =  Sale::select(DB::raw('Date(created_at) as date'), DB::raw('COUNT(*) as total_sale'))
           ->whereMonth('created_at', $currentMonth)
           ->whereYear('created_at', $currentYear)
           ->groupBy('date')
           ->orderBy('total_sale')
           ->get();
       $listDays = [];
       foreach ($topSellingCounts as $topSellingCount) {
           $date = Carbon::parse($topSellingCount->date);
           $listDays [] =
               ['days'=>$date->format('d M'),
                   "count"=>$topSellingCount->total_sale];   

       }
       $items->lineChart = $listDays;
       return response()->json([
           "status" => 'success',
           "redirect" => route('home'),
           "items" => $items
       ], 201);
   }
}
