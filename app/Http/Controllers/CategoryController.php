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
use MongoDB\Driver\Session;

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
     * @return
     */
    public function show(int $id)
    {
        $product = Category::where('id', $id)->first();
        $categories = Category::all();
        return
            view('pages.update_items')->with('items', [$categories, $product]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request, int $id)
    {

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
