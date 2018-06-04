<?php

namespace App\Http\Controllers;

use App\ItemCategory;
use App\Product;
use App\Admin;
use \Auth;
use \DB;

use Illuminate\Http\Request;

class ItemCategoryController extends Controller
{
    public function success($var, $action)
    {
        return ucwords($var) . ' was successfully '. $action . '!';
    }

    public function error($var, $action)
    {
        return 'Something went wrong '. $action . ' the '. $var . ', please try again.';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::setAdminInfo(Auth::user()->name);
        $data = [];
        foreach ($admins as $admin) {
            $data[] = $admin;
        }
        
        $cats = ItemCategory::orderBy('updated_at', 'desc')->paginate(5);
        // dd($cats);
        return view('item_categories.index')->with([
            'cats' => $cats,
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
        return view('item_categories.create');
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
            'name' => 'required|string|unique:roles|max:255'
        ]);

        $data = [
            'name' => $request->input('name'),
            'created_at' => now(),
            'updated_at' => now()
        ];

        $result = ( DB::table('item_categories')->insert($data) )
        ? redirect()->route('item_categories.index')->with('addSuccess', $this->success('Category', 'created'))
        : redirect()->back()->with('addError', $this->error('creating', 'category'));
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemCategory  $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemCategory $itemCategory)
    {
        // dd($itemCategory->id);
        return view('item_categories.edit', compact('itemCategory', $itemCategory));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemCategory  $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemCategory $itemCategory)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);

        $data = [
            'name' => $request->input('name'),
            'updated_at' => now()
        ];

        $result = ( DB::table('item_categories')->where('id', $itemCategory->id)->update($data) )
        ? redirect()->route('item_categories.index')->with('updateSuccess', $this->success('Category', 'updated'))
        : redirect()->back()->with('updateError', $this->error('updating', 'category'));
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemCategory  $itemCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemCategory $itemCategory)
    {
        $result = ( $itemCategory->delete() )
        ? redirect()->route('item_categories.index')->with('deleteSuccess', $this->success('Category', 'removed to trash'))
        : redirect()->back()->with('deleteError', $this->error('removing', 'category'));
        return $result;
    }
}
