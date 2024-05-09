<?php

namespace App\Http\Controllers\API;

use App\Constants\SaleConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;
use App\Http\Resources\SaleResource;
use App\Http\Traits\Access;
use App\Http\Traits\HttpResponses;
use App\Models\InvoiceSetting;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleProduct;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    use Access;
    use HttpResponses;

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->success(
            SaleResource::collection(Sale::all())
        );
    }

    /**
     * @param SaleRequest $request
     * * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $user = Auth::user()->id;
        $payment_type = $request->payment_type;
        $payment = Payment::where('type', $payment_type)->first();
        $sale = new Sale();
        $sale->matricule = $request->matricule;
        $sale->user_id = $user;
        $sale->client_name = $request->client_name;
        $sale->payment_id = $payment->id;
        $sale->save();
        $product_id = $request->product_id;
        $matricule = $request->matricule;
        $sale = Sale::where('matricule', $matricule)->first();
        $total_amount = 0.0;
        if (count($request->list_panier) == 0) {
            $product = Product::where('id', $product_id)->first();
            if (SaleProduct::where('product_id', $product->id)->first() != null) {
                $saleProduct = SaleProduct::where('product_id', $product->id)->first();
                $saleProduct->quantity += $request->quantity;
                $saleProduct->amount *= $saleProduct->quantity;
                $saleProduct->update();
                $total_amount += $saleProduct->amount;
            } else {
                $saleProduct = new SaleProduct();
                $saleProduct->quantity = $request->quantity;
                $saleProduct->amount = $product->price * $request->quantity;
                $saleProduct->product_id = $product->id;
                $saleProduct->sale_id = $sale->id;
                $saleProduct->save();
                $total_amount += $saleProduct->amount;
            }
            if ($sale->total_amount != 0) {
                $sale->total_amount += $total_amount;
            } else {
                $sale->total_amount = $total_amount;
            }
            $sale->update();
            if($sale->amount_given < $sale->total_amount){
                $sale->total_paid = 0;
                $sale->status = 'Unpaid';
            }
            else{
                $sale->total_paid = $sale->total_amount;
            }
            if (Sale::count() > 0 && $sale->status == 'Paid' ) {
                $topSaleFacture = DB::select("SELECT MAX(CAST(SUBSTRING_INDEX(facture_id, '#', -1) AS UNSIGNED)) AS max_initial_count
            FROM sales")[0]->max_initial_count;
                $prefix_id = InvoiceSetting::all()->first()->prefix_id;
                $initial_count = (int)$topSaleFacture + 1;
                $sale->facture_id = (int)$prefix_id + $initial_count;
            }
            elseif(Sale::count() == 0){
                $temporary_id = InvoiceSetting::all()->first()->temporary_id;
                $sale->facture_id = $temporary_id;
            }
            elseif(Sale::count() != 0){
                $temporary_count = DB::select("SELECT MAX(CAST(SUBSTRING_INDEX(facture_id, '#', -1) AS UNSIGNED)) AS temporary_count
                FROM sales WHERE facture_id LIKE 'TEMPORY%'")[0]->temporary_count;
                if( $temporary_count == null) {
                    $temporary_id = InvoiceSetting::all()->first()->temporary_id;
                    $sale->facture_id = $temporary_id;
                }
                else{
                    $get_count = $temporary_count;
                    return  $this->success(explode("#",$get_count));
                    $sale->facture_id = 'TEMPORY #'.(int)$temporary_count;
                }
            }
            $sale->update();
        } else {
            foreach ($request->list_panier as $item) {
                $product = Product::where('id', $item["product_id"])->first();
                $saleProduct = new SaleProduct();
                $saleProduct->quantity = $item["quantity"];
                $saleProduct->amount = $product->price * $item["quantity"];
                $saleProduct->product_id = $item["product_id"];
                $saleProduct->sale_id = $sale->id;
                $saleProduct->save();
                $total_amount += $saleProduct->amount;
                $sale->total_amount = $total_amount;
                $sale->save();
            }
            $sale->amount_given = $request->amount_given;
            $sale->income = $request->income;
            $sale->update();
            if($sale->amount_given < $sale->total_amount){
                $sale->total_paid = 0;
                $sale->status = 'Unpaid';
            }
            else{
                $sale->total_paid = $sale->total_amount;
            }
            if (Sale::count() > 0 && $sale->status == 'Paid' ) {
                $topSaleFacture = DB::select("SELECT MAX(CAST(SUBSTRING_INDEX(facture_id, '#', -1) AS UNSIGNED)) AS max_initial_count
            FROM sales")[0]->max_initial_count;
                $prefix_id = InvoiceSetting::all()->first()->prefix_id;
                $initial_count = (int)$topSaleFacture + 1;
                $sale->facture_id = (int)$prefix_id + $initial_count;
            }
            elseif(Sale::count() == 0){
                $temporary_id = InvoiceSetting::all()->first()->temporary_id;
                $sale->facture_id = $temporary_id;
            }
            elseif(Sale::count() != 0){
                $temporary_count = DB::select("SELECT MAX(CAST(SUBSTRING_INDEX(facture_id, '#', -1) AS UNSIGNED)) AS temporary_count
                FROM sales WHERE facture_id LIKE 'TEMPORY%'")[0]->temporary_count;
                if( $temporary_count == null) {
                    $temporary_id = InvoiceSetting::all()->first()->temporary_id;
                    $sale->facture_id = $temporary_id;
                }
                else{
                    $get_count = $temporary_count;
                    $get_count_expanded = explode("#",$get_count);
                    $sale->facture_id = 'TEMPORY #'.(int)$get_count_expanded[0]+1;
                }
            }
            $sale->update();
        }
        return $this->success(
            new SaleResource($sale),
            SaleConstants::STORE
        );
    }

    /**
     * @param int $id
     * * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $sale = Sale::where('id', $id)->first();
        //        if (!$this->canAccess($user)) {
        //            return $this->error([], AuthConstants::PERMISSION);
        //        }

        return $this->success(new SaleResource($sale));
    }

    /**
     * @param SaleRequest $request
     * * @param int $id
     * * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        if ($request->user) {
            return $this->error([], 'Cannot change the user of this sale, you can just change (client, amount and payment_type)');
        }
        $sale = Sale::where('id', $id)->first();

        $sale->update($request->all());

        return $this->success(
            new SaleResource($sale),
            SaleConstants::UPDATE
        );
    }

    /**
     * @param int $id
     * * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        //        if (!$this->canAccess($user)) {
        //            return $this->error([], AuthConstants::PERMISSION);
        //        }
        $sale = Sale::where('id', $id)->first();

        $sale->delete();

        return $this->success([], SaleConstants::DESTROY);
    }
}
