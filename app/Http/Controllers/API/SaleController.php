<?php

namespace App\Http\Controllers\API;

use App\Constants\SaleConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;
use App\Http\Resources\SaleResource;
use App\Http\Traits\Access;
use App\Http\Traits\HttpResponses;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleProduct;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    use Access;
    use HttpResponses;

    /**
     * @return JsonResponse
     */
    public function index():JsonResponse
    {
        return $this->success(
            SaleResource::collection(Sale::all())
        );
    }

    /**
     * @param SaleRequest $request
     * * @return JsonResponse
     */
    public function store(Request $request):JsonResponse
    {
        $user = Auth::user()->id;
        $payment_type = $request->payment_type;
        $payment = Payment::where('type',$payment_type)->first();
        $sale = new Sale();
        $sale->matricule = $request->matricule;
        $sale->user_id = $user;
        $sale->client_name = $request->client_name;
        $sale->payment_id = $payment->id;
        $sale->save();
        $product_id = $request->product_id;
        $matricule = $request->matricule;
        $sale = Sale::where('matricule', $matricule)->first();
        $total_paid = 0.0;
        if(count($request->list_panier)==0) {
            $product = Product::where('id', $product_id)->first();
                if (SaleProduct::where('product_id', $product->id)->first() != null) {
                    $saleProduct = SaleProduct::where('product_id', $product->id)->first();
                    $saleProduct->quantity += $request->quantity;
                    $saleProduct->amount *= $saleProduct->quantity;
                    $saleProduct->update();
                    $total_paid += $saleProduct->amount;
                } else {
                    $saleProduct = new SaleProduct();
                    $saleProduct->quantity = $request->quantity;
                    $saleProduct->amount = $product->price * $request->quantity;
                    $saleProduct->product_id = $product->id;
                    $saleProduct->sale_id = $sale->id;
                    $saleProduct->save();
                    $total_paid += $saleProduct->amount;
                }
                if ($sale->total_paid != 0) {
                    $sale->total_paid += $total_paid;
                } else {
                    $sale->total_paid = $total_paid;
                }
            $sale->update();
        }
        else{
            foreach ($request->list_panier as $item) {
                $product = Product::where('id', $item["product_id"])->first();
                    $saleProduct = new SaleProduct();
                    $saleProduct->quantity = $item["quantity"];
                    $saleProduct->amount = $product->price * $item["quantity"];
                    $saleProduct->product_id = $item["product_id"];
                    $saleProduct->sale_id = $sale->id;
                    $saleProduct->save();
                    $total_paid += $saleProduct->amount;
                    $sale->total_paid = $total_paid;
                    $sale->save();
            }
            $sale->amount_given = $request->amount_given;
            $sale->income = $request->income;
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
    public function show(int $id):JsonResponse
    {
        $sale = Sale::where('id',$id)->first();
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
    public function update(Request $request, int $id):JsonResponse
    {
        if ($request->user) {
            return $this->error([], 'Cannot change the user of this sale, you can just change (client, amount and payment_type)');
        }        $sale = Sale::where('id',$id)->first();

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
    public function destroy(int $id):JsonResponse
    {
//        if (!$this->canAccess($user)) {
//            return $this->error([], AuthConstants::PERMISSION);
//        }
        $sale = Sale::where('id',$id)->first();

        $sale->delete();

        return $this->success([], SaleConstants::DESTROY);
    }
}
