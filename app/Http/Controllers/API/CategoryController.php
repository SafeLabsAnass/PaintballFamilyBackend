<?php

namespace App\Http\Controllers\API;

use App\Constants\AuthConstants;
use App\Constants\CategoryConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Traits\Access;
use App\Http\Traits\HttpResponses;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    use Access;
    use HttpResponses;

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->success(
            CategoryResource::collection(Category::all())
        );
    }

    /**
     * @param CategoryRequest $request
     * @return JsonResponse
     */
    public function store(CategoryRequest $request): JsonResponse
    {
        return $this->success(
            new CategoryResource(Category::create($request->all())),
            CategoryConstants::STORE
        );
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $category = DB::table('categories')->where('id',$id)->first();
        $category_ = Category::find($category->id);
//        if (!$this->canAccess($category)) {
//            return $this->error([], AuthConstants::PERMISSION);
//        }

        return $this->success(new CategoryResource($category_));
    }

    /**
     * @param CategoryRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(CategoryRequest $request, int $id): JsonResponse
    {
//        if (!$this->canAccess($category)) {
//            return $this->error([], AuthConstants::PERMISSION);
//        }
        $category = DB::table('categories')->where('id',$id)->first();
        $category_ = Category::find($category->id);
        $category_->update($request->all());

        return $this->success(
            new CategoryResource($category_),
            CategoryConstants::UPDATE
        );
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
//        if (!$this->canAccess($category)) {
//            return $this->error([], AuthConstants::PERMISSION);
//        }
        $category = DB::table('categories')->where('id',$id)->first();
        $category_ = Category::find($category->id);
        $category_->delete();

        return $this->success([], CategoryConstants::DESTROY);
    }
}
