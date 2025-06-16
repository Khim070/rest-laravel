<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     title="Laravel API Documentation",
 *     version="1.0.0",
 *     description="API documentation for your Laravel backend"
 * )
 */
class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/category",
     *     tags={"Category"},
     *     summary="Get all categories",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index(){
        try{
            $category = Category::where('active', 1)->get();
            return response()->json([
                'data' => $category,
                'status' => 200,
                'message' => 'Success to fetch category'
            ]);
        }catch (Exception $e){
            return response()->json([
                'status' => 500,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/category/{id}",
     *     tags={"Category"},
     *     summary="Get specific category by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Category not found"
     *     )
     * )
     */
    public function show($id){
        try{
            $category = Category::where('active', 1)->where('id', $id)->first();

            if(!$category){
                return response()->json([
                    'message' => 'Category not found',
                    'status' => 404
                ]);
            }

            return response()->json([
                'data' => $category,
                'status' => 200,
                'message' => 'Success to fetch a category'
            ]);
        }catch (Exception $e){
            return response()->json([
                'status' => 500,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/category",
     *     tags={"Category"},
     *     summary="Create a new category",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name"},
     *             @OA\Property(property="name", type="string", example="Books")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Category created successfully"
     *     )
     * )
     */
    public function create(CategoryRequest $request){
        try {
            $data = $request->validated();

            // Ensure default value for 'active' field
            $data['active'] = 1;

            $category = Category::create($data);

            return response()->json([
                'data' => $category,
                'status' => 201,
                'message' => 'Success to create a category'
            ], 201);
        } catch(Exception $e) {
            return response()->json([
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/category/{id}",
     *     tags={"Category"},
     *     summary="Update specific category by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name"},
     *             @OA\Property(property="name", type="string", example="Updated Category")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Category not found"
     *     )
     * )
     */
    public function update(CategoryRequest $request, $id)
    {
        try {
            $category = Category::find($id);

            if (!$category) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Category not found'
                ], 404);
            }

            $validated = $request->validated();

            $category->update($validated);

            return response()->json([
                'data' => $category,
                'status' => 200,
                'message' => 'Success to update a category'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/category/{id}",
     *     tags={"Category"},
     *     summary="Delete category by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Category not found"
     *     )
     * )
     */
    public function visible($id){
        try {
            $category = Category::find($id);

            if (!$category) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Category not found'
                ], 404);
            }

            $category->active = !$category->active;
            $category->save();

            return response()->json([
                'data' => $category,
                'status' => 200,
                'message' => 'Success to delete a category'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
