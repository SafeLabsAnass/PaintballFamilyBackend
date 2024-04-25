<?php

namespace App\Http\Controllers;

use App\Constants\CategoryConstants;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Traits\Access;
use App\Http\Traits\HttpResponses;
use App\Models\Category;
use App\Models\Product;
use ErrorException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    use Access;
    use HttpResponses;

    /**
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
            $items = [Category::all(), Product::all()];
                return view('pages.categories')->with('items', $items);
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
        return redirect('/categories');
    }

    /**
     * @param int $id
     * @return
     */
    public function show(int $id)
    {
        $categorie = DB::table('categories')->where('id', $id)->first();
        return
            view('pages.update_category')->with('categorie', $categorie);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $category = Category::find($id);
        if ($request->name == $category->name && $request->imageTest == $category->image) {
            return response()->json([
                "status" => 'error',
                "redirect" => route('update_category', $id)
            ], 201);
        } else {
            $category->name = $request->name;
            if (file_exists(storage_path('app/public' . '/' . $request->imageTest))) {
                $category->image = $request->imageTest;
            } else {
                request()->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = request()->image->getClientOriginalName();
                request()->image->move(storage_path('app/public'), $imageName);
                $category->image = $imageName;

            }
            $category->save();
            return response()->json([
                "status" => 'success',
                "redirect" => route('categories')
            ], 201);
        }

    }

    /**
     * @param int $id
     * @return
     */
    public function destroy(int $id)
    {
            $category = Category::find($id);
            $category->delete();
        return redirect('/categories');

    }
}
