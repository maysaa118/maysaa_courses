<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view(('admin.categories.index'), compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate input
        Validator::make($request->all(), [
            'name' => 'required|unique:categories,name'
        ], [
            'required' => 'هذا الحقل مطلوب'
        ])->validate();

        //Add value
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        //redirect to index with message

        return redirect()->route('categories.index')
                         ->with('success', 'Category Added Successfuly');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        Validator::make($request->all(), [
            'name' => 'required'
        ], [
            'required' => 'هذا الحقل مطلوب'
        ])->validate();

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('categories.index')
        ->with('success', 'Category Updated Successfuly');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Category::destroy($id);
        $category->delete();
        return redirect()->route('categories.index')
        ->with('success', 'Category Deleted Successfuly');

    }
}
