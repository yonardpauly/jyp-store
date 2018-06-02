<?php

namespace App\Http\Controllers;

use App\ItemCategory;
use Illuminate\Http\Request;
use \DB;

class ItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = ItemCategory::orderBy('updated_at', 'desc')->paginate(5);
        // dd($cats);
        return view('item_categories.index', compact('cats', $cats));
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
        ? redirect()->route('item_categories.index')->with('addSuccess', 'Category was successfully created!')
        : redirect()->back()->with('addError', 'There are problems saving category, please try again');
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
        ? redirect()->route('item_categories.index')->with('updateSuccess', 'Category was successfully updated!')
        : redirect()->back()->with('updateError', 'There are problems updating category, please try again');
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
        ? redirect()->route('item_categories.index')->with('deleteSuccess', 'Category was successfully moved to trash!')
        : redirect()->back()->with('deleteError', 'There are problems deleting the category, please try again');
        return $result;
    }
}
