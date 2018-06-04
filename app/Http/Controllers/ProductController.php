<?php

namespace App\Http\Controllers;

use App\Product;
use App\Admin;
use \Auth;
use App\ItemCategory;
use \DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('updated_at', 'desc')
        ->paginate(3);
        $admins = Admin::setAdminInfo(Auth::user()->name);
        $data = [];
        foreach ($admins as $admin) {
            $data[] = $admin;
        }
        return view('products.index')->with([
            'products' => $products,
            'name' => $data[0]->name,
            'email' => $data[0]->email
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = ItemCategory::orderBy('name', 'asc')->get();
        return view('products.create', compact('cats', $cats));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:products',
            'product_type' => 'required|integer',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        $slug1 = explode(' ', $request->input('name'));
        $slug2 = strtolower(implode('-', $slug1));

        $data = [
            'name' => $request->input('name'),
            'item_category_id' => $request->input('product_type'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'slug' => $slug2,
            'created_at' => now(),
            'updated_at' => now()
        ];

        $result = ( DB::table('products')->insert($data) )
        ? redirect()->route('products.index')->with('addSuccess', 'Product was successfully added!')
        : redirect()->back()->with('addError', 'There are problems creating the product, please try again');
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $cats = ItemCategory::orderBy('name', 'asc')->get();
        return view('products.edit')->with([
            'product' => $product,
            'cats' => $cats
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'product_type' => 'required|integer',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        $slug1 = explode(' ', $request->input('name'));
        $slug2 = strtolower(implode('-', $slug1));

        $data = [
            'name' => $request->input('name'),
            'item_category_id' => $request->input('product_type'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'slug' => $slug2,
            'updated_at' => now()
        ];

        $result = ( DB::table('products')->where('id', $product->id)->update($data) )
        ? redirect()->route('products.index')->with('updateSuccess', 'Product was successfully updated!')
        : redirect()->back()->with('updateError', 'There are problems updating the product, please try again');
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $result = ( $product->delete() )
        ? redirect()->route('products.index')->with('deleteSuccess', 'Product was successfully moved to trash!')
        : redirect()->back()->with('deleteError', 'There are problems deleting the product, please try again');
        return $result;
    }
}
