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
        $itemsPerPage = session('itemsPerPage', 6);
//        $list = [6,15,20,25,30];
        $items = [Category::paginate(7), Product::paginate(7)];

                return view('pages.categories')->with('items', $items);
    }

    public function checkCategoryTab(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $check_tab = 'category';
        $items = [Category::paginate(7), Product::paginate(6), $check_tab];

        return view('pages.categories')->with('items', $items);
    }

    public function checkProductTab(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $check_tab = 'product';
        $items = [Category::paginate(7), Product::paginate(6), $check_tab];

        return view('pages.categories')->with('items', $items);
    }

    public function updatePerPage(Request $request)
    {
        // Retrieve the selected number of items per page
        $itemsPerPage = $request->input('itemsPerPage', 15); // Default to 15 if not provided

        // Store the selected number of items per page in session or any other storage mechanism
        session(['itemsPerPage' => $itemsPerPage]);

        // Redirect back to the previous page
        return redirect()->back();
    }
    /**
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
//        dd($request->all());
        request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:40048',
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
        $cookie_name = "tabProductOpened";
        $cookie_value = "";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
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
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:40048',
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
