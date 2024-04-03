<?php

namespace App\Http\Controllers;

use App\Constants\CategoryConstants;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Traits\Access;
use App\Http\Traits\HttpResponses;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use Access;
    use HttpResponses;

    /**
     * @return
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('pages.categories')->with('items',[Category::all(),Product::all()]);
    }

    /**
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
//        dd($request->all());
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = request()->image->getClientOriginalName();
        request()->image->move(storage_path('app/public'), $imageName);
        $category = new Category();
        $category->name = $request->name;
        $category->image = $imageName;
        $category->save();
        return back();
    }
    public function upload()
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = request()->image->getClientOriginalName();
        request()->image->move(storage_path('app/public'), $imageName);
        return back();
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $category = Category::where('id',$id)->first();
//        if (!$this->canAccess($category)) {
//            return $this->error([], AuthConstants::PERMISSION);
//        }

        return $this->success(new CategoryResource($category));
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
        $category = Category::where('id',$id)->first();
        $category->update($request->all());

        return $this->success(
            new CategoryResource($category),
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
        $category = Category::where('id',$id)->first();

        $category->delete();

        return $this->success([], CategoryConstants::DESTROY);
    }
}
