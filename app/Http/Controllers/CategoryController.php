<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreRequestCategories;
use App\Http\Requests\UpdateRequestCategories;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): object
    {

        $categories = Category::all();

        return response()->json([
            'categories' => $categories,
            'status' => true
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequestCategories $request): object|null
    {
        $category = Category::create([
            'slug' => Str::slug($request->name),
            'name' => $request->name
        ]);

        return response()->json([
            'category' => $category,
            'status' => true,
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category): object
    {
        return response()->json([
            'status' => true,
            'category' => $category
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequestCategories $request, Category $category) : object
    {

        $category->slug = Str::slug($request->name);
        $category->name = $request->name;
        $category->save();

        return response()->json([
            'category' => $category,
            'status' => true,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category): object|null
    {

        $category->delete();

        return response()->json([
            'status' => true
        ], 200);
    }
}
