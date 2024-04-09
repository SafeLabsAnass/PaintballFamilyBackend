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
    public function index()
    {
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
        $category = DB::table('categories')->where('name', $request->category)->first();
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $category->id;
        $product->image = $imageName;
        $product->save();
        return redirect ('/categories');
    }

    public function upload(): \Illuminate\Http\RedirectResponse
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = request()->image->getClientOriginalName();
        Session::put('imageName', $imageName);
        request()->image->move(storage_path('app/public'), $imageName);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id, Request $request)
    {
        $product = Product::where('id', $id)->first();
        $categories = Category::all();
        return
            view('pages.update_items')->with('items', [$categories, $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $product = Product::where('id', $id)->first();
        $category = DB::table('categories')->where('name',$request->category)->first();
        if ($request->name == $product->name && $request->price == $product->price && $request->image == $product->image
            && $category->id == $product->category_id && $request->description == $product->decription) {
            dd('It same');
        }
        else{
//            dd($request->image);
            $product->name = $request->name;
            $product->image = $request->image;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->category_id = $category->id;
            $product->update();
            return redirect ('/categories');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return redirect('/categories');

    }
}
