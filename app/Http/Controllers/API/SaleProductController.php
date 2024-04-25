<?php

namespace App\Http\Controllers\API;

use App\Constants\SaleProductConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaleProductRequest;
use App\Http\Resources\SaleProductResource;
use App\Http\Traits\Access;
use App\Http\Traits\HttpResponses;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleProduct;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class SaleProductController extends Controller
{
    use Access;
    use HttpResponses;

    /**
     * @return JsonResponse
     */
    public function index():JsonResponse
    {
        return $this->success(SaleProductResource::collection(SaleProduct::all()));
    }

    /**
     * @param SaleProductRequest $request
     * * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {

        $product_name = $request->product_name;
        $matricule = $request->matricule;
        $product = Product::where('name',$product_name)->first();
        $sale = Sale::where('matricule',$matricule)->first();
        $total_paid = 0.0;
        if (SaleProduct::where('product_id',$product->id)->first()!=null){
            $saleProduct = SaleProduct::where('product_id',$product->id)->first();
            $saleProduct->quantity += $request->quantity;
            $saleProduct->amount *= $saleProduct->quantity;
            $saleProduct->update();
            $total_paid += $saleProduct->amount;
        }
        else {
            $saleProduct = new SaleProduct();
            $saleProduct->quantity = $request->quantity;
            $saleProduct->amount = $product->price * $request->quantity;
            $saleProduct->product_id = $product->id;
            $saleProduct->sale_id = $sale->id;
            $saleProduct->save();
            $total_paid += $saleProduct->amount;
        }
        if($sale->total_paid!=0){
            $sale->total_paid += $total_paid;
        }
        else{
            $sale->total_paid = $total_paid;
        }
        $sale->save();

        return $this->success(new SaleProductResource($saleProduct), SaleProductConstants::STORE);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $saleProduct = SaleProduct::where('id',$id)->first();
//        if (!$this->canAccess($user)) {
//            return $this->error([], AuthConstants::PERMISSION);
//        }

        return $this->success(new SaleProductResource($saleProduct));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): JsonResponse
    {
        if ($request->amount) {
            return $this->error([], 'Cannot change the amount of this saleProduct');
        }
        $saleProduct = SaleProduct::where('id',$id)->first();
        $check_product = Product::where('id',$saleProduct->product_id )->first();
        $total_paid = 0.0;
        if ($request->product != $check_product->name ){
            $product = Product::where('name',$request->product)->first();
            $productSale = SaleProduct::where('product_id',$product->name)->first();
            if($product==null){
                return $this->error([], 'Cannot found this product');
            }
            elseif($productSale==null){
                $saleProduct->product_id = $product->id;
                $saleProduct->quantity = $request->quantity;
                $saleProduct->amount = $saleProduct->quantity*$product->price;
            }
            else {
                $saleProduct->quantity = $request->quantity;
                $saleProduct->amount = $saleProduct->quantity * $product->price;
            }
        }
        else {
            $saleProduct->quantity = $request->quantity;
            $saleProduct->amount = $saleProduct->quantity*$check_product->price;
        }
        $saleProduct->update();
        $total_paid = $saleProduct->amount;
        $sale = Sale::find($saleProduct->sale_id);
        if($sale->total_paid!=0){
            $sale->total_paid += $total_paid;
        }
        else{
            $sale->total_paid = $total_paid;
        }
        $sale->save();
        return $this->success(
            new SaleProductResource($saleProduct),
            SaleProductConstants::UPDATE
        );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $saleProduct = SaleProduct::where('id',$id)->first();

        $saleProduct->delete();

        return $this->success([], SaleProductConstants::DESTROY);
    }
}
