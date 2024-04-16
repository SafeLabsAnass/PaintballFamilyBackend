<?php

namespace App\Http\Controllers\API;

use App\Constants\AuthConstants;
use App\Constants\ProductConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Traits\Access;
use App\Http\Traits\HttpResponses;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use Access;
    use HttpResponses;

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->success(ProductResource::collection(Product::all()));
    }

    /**
     * @param ProductRequest $request
     * @return JsonResponse
     */
    public function store(ProductRequest $request): JsonResponse
    {
//        $product = auth()->user()->products()->create($request->all());
//
//        if (isset($request->categories)) {
//            $categories = Category::ForUserByIds($request->categories);
//
//            if (!$categories->isEmpty()) {
//                $product->categories()->attach($categories);
//            }
//        }
        $category_name = $request->category;
        $category = DB::table('categories')->where('name',$category_name)->first();
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $category->id;
        $product->save() ;


        return $this->success(new ProductResource($product), ProductConstants::STORE);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $product = Product::where('id',$id)->first();
//        if (!$this->canAccess($product)) {
//            return $this->error([], AuthConstants::PERMISSION);
//        }

        return $this->success(new ProductResource($product));
    }

    /**
     * @param ProductRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(ProductRequest $request, int $id): JsonResponse
    {
//        if (!$this->canAccess($product)) {
//            return $this->error(AuthConstants::PERMISSION);
//        }
//
//        if (isset($request->categories)) {
//            $categories = Category::ForUserByIds($request->categories);
//
//            $product->categories()->detach();
//            if (!$categories->isEmpty()) {
//                $product->categories()->attach($categories);
//            }
//        }
        $product = Product::where('id',$id)->first();
        $product->update($request->all());

        return $this->success(new ProductResource($product), ProductConstants::UPDATE);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
//        if (!$this->canAccess($product)) {
//            return $this->error(AuthConstants::PERMISSION);
//        }
        $product = Product::where('id',$id)->first();
        $product->delete();

        return $this->success([], ProductConstants::DESTROY);
    }
}
