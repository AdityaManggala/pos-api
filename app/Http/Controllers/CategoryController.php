<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoryResource::collection(Category::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $category = Category::create($data);
        return (new CategoryResource($category))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (!Category::where('CategoryId', $id)->exists()) {
            return response()->json([
                'message' => 'Category not found',
            ])->setStatusCode(404);
        }
        return new CategoryResource(Category::findOrfail($id));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->validated();
        if (!Category::where('CategoryId', $id)->exists()) {
            return response()->json([
                'message' => 'Category not found',
            ])->setStatusCode(404);
        }
        $category = Category::findOrfail($id);
        $category->update($data);
        return (new CategoryResource($category))->response()->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!Category::where('CategoryId', $id)->exists()) {
            return response()->json([
                'message' => 'Category not found',
            ])->setStatusCode(404);
        }
        $category = Category::findOrfail($id);
        $category->delete();
        return response()->json([
            'messsage' => 'Category deleted successfully',
        ])->setStatusCode(200);
    }
}
