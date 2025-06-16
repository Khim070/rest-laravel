<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/product",
     *     tags={"Product"},
     *     summary="Get all active products",
     *     @OA\Response(
     *         response=200,
     *         description="List of active products"
     *     )
     * )
     */
    public function index()
    {
        try {
            $product = Product::with([
                'image',
                'category'
            ])->where('active', 1)->get();

            return $this->sendResponse($product);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve product', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/product/{id}",
     *     tags={"Product"},
     *     summary="Get a product by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product retrieved successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found"
     *     )
     * )
     */
    public function show($id){
        try {
            $product = Product::with([
                'image',
                'category'
            ])->where('id', $id)->where('active', 1)->first();

            if(!$product){
                return $this->sendResponse(!$product, 404, 'Product not found');
            }

            return $this->sendResponse($product);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve product', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/product",
     *     tags={"Product"},
     *     summary="Create a new product",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "description", "price", "stock", "category_id"},
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="price", type="number", format="float"),
     *             @OA\Property(property="stock", type="integer"),
     *             @OA\Property(property="image", type="integer"),
     *             @OA\Property(property="category_id", type="integer")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Product created successfully"
     *     )
     * )
     */
    public function create(ProductRequest $request){
        try{
            $data = $request->validated();

            if(!isset($data['p_order'])){
                $data['p_order'] = Product::max('p_order') + 1;
            }
            $data['active'] = 1;

            $product = Product::create($data);

            return $this->sendResponse($product, 201, 'Product created');
        }catch(Exception $e){
            return $this->sendError('Failed to create product', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/product/{id}",
     *     tags={"Product"},
     *     summary="Update a product by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="price", type="number", format="float"),
     *             @OA\Property(property="stock", type="integer"),
     *             @OA\Property(property="category_id", type="integer"),
     *             @OA\Property(property="image", type="integer"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product updated successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found"
     *     )
     * )
     */
    public function update(ProductRequest $request, $id){
        try{
            $product = Product::find($id);

            if (!$product) {
                return $this->sendResponse(!$product, 404, 'Product not found');
            }

            $validated = $request->validated();

            $product->update($validated);

            return $this->sendResponse($product, 200, "Update successful");
        }catch(Exception $e){
            return $this->sendError('Failed to update product', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/product/{id}",
     *     tags={"Product"},
     *     summary="Delete a product by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="delete product successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found"
     *     )
     * )
     */
    public function visible($id){
        try{
            $product = Product::find($id);
            if(!$product){
                return $this->sendError('Product Not found', 404);
            }

            $product->active = $product->active == 1 ? 0 : 1;
            $product->save();

            return $this->sendResponse([], 200, "Product delete successful");
        }catch(Exception $e){
            return $this->sendError('Failed to delete the product', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/product/reorder",
     *     tags={"Product"},
     *     summary="Reorder products",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="p_order", type="integer", example=2)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product order updated successfully"
     *     )
     * )
     */
    public function reorder(ProductRequest $request){
        try{
            $product = $request->validated();

            foreach($product as $item){
                Product::where('id', $item['id'])->update(['p_order' => $item['p_order']]);
            }

            return response()->json([
                'message' => "Product order updated successfully",
            ], 200);
        } catch (Exception $e) {
            return $this->sendError('Failed to reorder product', 500, [$e->getMessage()]);
        }
    }
}
