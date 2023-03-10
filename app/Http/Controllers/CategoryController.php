<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\Category\CategoryCollection;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CategoryCollection(Category::orderBy('id', 'asc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function store(CategoryRequest $request)
    {
        $input = $request->validated();

        if (Category::where('name', $input['name'])->exists()) {
            return new JsonResponse([
                'message' => 'The new category has already existed'
            ], Response::HTTP_BAD_REQUEST);
        } else {
            return new CategoryResource(Category::create($input));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.`
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (!$category->ideas->first()) {
            $category->delete();
            return new JsonResponse(
                [
                    'message' => 'Deleted category ' . $category->name
                ],
                Response::HTTP_OK
            );
        }
        return new JsonResponse(
            [
                'message' => 'Category ' . $category->name . ' is still in use'
            ],
            Response::HTTP_BAD_REQUEST
        );
    }
}
