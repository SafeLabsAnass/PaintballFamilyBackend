<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PHPUnit\Metadata\PostCondition;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()    {
//        $products=product::all();
//        return view('pages.categories')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:200048',
        ]);
        $imageName = request()->image->getClientOriginalName();
        request()->image->move(storage_path('app/public'), $imageName);
        $category = DB::table('categories')->where('name',$request->category)->first();
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $category->id;
        $product->image = $imageName;
        $product->save();
        $cookie_name = "tabProductOpened";
        $cookie_value = "product";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        return redirect('/categories');
    }
    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $product = Product::where('id', $id)->first();
        $categories = Category::all();
        $cookie_name = "tabProductOpened";
        $cookie_value = "product";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        return
            view('pages.update_product')->with('items', [$categories,$product]);

    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $product = Product::find($id);
        $category=DB::table('categories')->where('name',$request->category)->first();
        if ($request->name == $product->name && $request->imageTest == $product->image && (double)$request->price == $product->price
        && $request->category == $category->name && $request->description == $product->description) {
            return response()->json([
                "status" => 'error',
                "redirect" => route('product.show', $id)
            ], 201);
        } else {
            $product->name = $request->name;
            if (file_exists(storage_path('app/public' . '/' . $request->imageTest))) {
                $product->image = $request->imageTest;
            } else {
                request()->validate([
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:40048',
                ]);
                $imageName = request()->image->getClientOriginalName();
                request()->image->move(storage_path('app/public'), $imageName);
                $product->image = $imageName;

            }
            $product->category_id = $category->id;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->save();
            $cookie_name = "tabProductOpened";
            $cookie_value = "product";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            return response()->json([
                "status" => 'success',
                "redirect" => route('categories')
            ], 201);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $product = Product::where('id',$id);
        $product->delete();
        return redirect('/categories');

    }
}
