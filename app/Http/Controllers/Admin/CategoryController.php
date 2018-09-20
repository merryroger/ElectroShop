<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addcat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $image = $request->file('image');
        $path = $image->storeAs('categories', $image->getClientOriginalName(), 'public');
        Storage::url($path);

        $fields = $request->except(['_token', 'image']);
        $fields['image'] = $path;

        Category::create($fields);

        return redirect()->route('admin.categories.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.catshow', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.editcat', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryUpdateRequest $category)
    {
        $fields = $request->except(['_token', '_method', 'id', 'image']);
        $id = intval($request->get('id'));
        $storedData = Category::find($id);
        $image = $request->file('image');
        if($image != null) {
            $path = $image->storeAs('categories', $image->getClientOriginalName(), 'public');
            Storage::disk('public')->delete($storedData->image);
            Storage::url($path);
            $fields['image'] = $path;
        }

        $storedData->update($fields);

        return redirect()->route('admin.categories.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
