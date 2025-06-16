<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderProductRequest;
use App\Models\OrderProduct;
use Exception;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/orderproduct",
     *     tags={"Order Product"},
     *     summary="Get all order products",
     *     @OA\Response(
     *         response=200,
     *         description="List of order products"
     *     )
     * )
     */
public function index()
    {
        try {
            $orderproduct = OrderProduct::with([
                'user'
            ])->where('active', 1)->get();

            return $this->sendResponse($orderproduct);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve orderproduct', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/orderproduct/{id}",
     *     tags={"Order Product"},
     *     summary="Get order product by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Order product details"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Order product not found"
     *     )
     * )
     */
    public function show($id)
    {
        try {
            $orderproduct = OrderProduct::with([
                'user'
            ])->where('id', $id)->where('active', 1)->first();

            if (!$orderproduct) {
                return $this->sendResponse(!$orderproduct, 404, 'Order product not found');
            }

            return $this->sendResponse($orderproduct);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve order product', 500, [$e->getMessage()]);
        }
    }


    /**
     * @OA\Post(
     *     path="/api/orderproduct",
     *     tags={"Order Product"},
     *     summary="Create a new order product",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"user_id"},
     *             @OA\Property(property="user_id", type="integer"),
     *             @OA\Property(property="total_price", type="number", format="double"),
     *             @OA\Property(property="status", type="string", enum={"pending", "processing", "shipped", "delivered", "cancelled"})
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Order product created"
     *     )
     * )
     */
    public function create(OrderProductRequest $request)
    {
        try {
            $data = $request->validated();

            $data['active'] = 1;

            $orderproduct = OrderProduct::create($data);

            return $this->sendResponse($orderproduct, 201, 'Order product created');
        } catch (Exception $e) {
            return $this->sendError('Failed to create order product', 500, [$e->getMessage()]);
        }
    }


    /**
     * @OA\Post(
     *     path="/api/orderproduct/{id}",
     *     tags={"Order Product"},
     *     summary="Update an existing order product",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="user_id", type="integer"),
     *             @OA\Property(property="total_price", type="number", format="double"),
     *             @OA\Property(property="status", type="string", enum={"pending", "processing", "shipped", "delivered", "cancelled"})
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Order product updated successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Order product not found"
     *     )
     * )
     */
    public function update(OrderProductRequest $request, $id)
    {
        try {
            $orderproduct = OrderProduct::find($id);

            if (!$orderproduct) {
                return $this->sendResponse(!$orderproduct, 404, 'Order product not found');
            }

            $validated = $request->validated();

            $orderproduct->update($validated);

            return $this->sendResponse($orderproduct, 200, "Update successful");
        } catch (Exception $e) {
            return $this->sendError('Failed to update order product', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/orderproduct/{id}",
     *     tags={"Order Product"},
     *     summary="Delete an order product",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Order product delete successful"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Order product not found"
     *     )
     * )
     */
    public function visible($id)
    {
        try {
            $orderproduct = OrderProduct::find($id);
            if (!$orderproduct) {
                return $this->sendError('Order product Not found', 404);
            }

            $orderproduct->active = $orderproduct->active == 1 ? 0 : 1;
            $orderproduct->save();

            return $this->sendResponse([], 200, "Order product delete successful");
        } catch (Exception $e) {
            return $this->sendError('Failed to delete the order product', 500, [$e->getMessage()]);
        }
    }
}
