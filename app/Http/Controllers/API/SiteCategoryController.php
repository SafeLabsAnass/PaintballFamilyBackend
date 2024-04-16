<?php

namespace App\Http\Controllers\API;

use App\Constants\SiteCategoryConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\SiteCategoryRequest;
use App\Http\Resources\SiteCategoryResource;
use App\Http\Traits\Access;
use App\Http\Traits\HttpResponses;
use App\Models\Category;
use App\Models\Site;
use App\Models\SiteCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteCategoryController extends Controller
{
    use Access;
    use HttpResponses;

    /**
     * @return JsonResponse
     */
    public function index():JsonResponse
    {
        return $this->success(SiteCategoryResource::collection(SiteCategory::all()));
    }

    /**
     * @param SiteCategoryRequest $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {

            $site_name = $request->site_name;
            $site = Site::where('name', $site_name)->first();
            $category_name = $request->category_name;
            $category = Category::where('name', $category_name)->first();
            $siteCategory = new SiteCategory();
            $siteCategory->site_id = $site->id;
            $siteCategory->category_id = $category->id;
            $siteCategory->save();

            return $this->success(new SiteCategoryResource($siteCategory), SiteCategoryConstants::STORE);
        }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $siteCategory = SiteCategory::where('id',$id)->first();
        return $this->success(new SiteCategoryResource($siteCategory));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $siteCategory = SiteCategory::where('id',$id)->first();
        $site_name = $request->site;
        $site = Site::where('name', $site_name)->first();
        $category_name = $request->category;
        $category = DB::table('categories')->where('name', $category_name)->first();
        $siteCategory->site_id = $site->id;
        $siteCategory->category_id = $category->id;
        $siteCategory->update();

        return $this->success(
            new SiteCategoryResource($siteCategory),
            SiteCategoryConstants::UPDATE
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $siteCategory = SiteCategory::where('id',$id)->first();

        $siteCategory->delete();

        return $this->success([], SiteCategoryConstants::DESTROY);
    }
}
