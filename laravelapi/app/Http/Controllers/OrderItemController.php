<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderItemRequest;
use App\Models\OrderItem;
use Exception;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/orderitem",
     *     tags={"Order Item"},
     *     summary="Get all order items",
     *     @OA\Response(
     *         response=200,
     *         description="List of all order items"
     *     )
     * )
     */
public function index()
    {
        try {
            $orderitem = OrderItem::with([
                'orderproduct',
                'product'
            ])->where('active', 1)->get();

            return $this->sendResponse($orderitem);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve order item', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/orderitem/{id}",
     *     tags={"Order Item"},
     *     summary="Get order item by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Order item details"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Order item not found"
     *     )
     * )
     */
public function show($id)
    {
        try {
            $orderitem = OrderItem::with([
                'orderproduct',
                'product'
            ])->where('id', $id)->where('active', 1)->first();

            if (!$orderitem) {
                return $this->sendResponse(!$orderitem, 404, 'Order item not found');
            }

            return $this->sendResponse($orderitem);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve order item', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/orderitem",
     *     tags={"Order Item"},
     *     summary="Create a new order item",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"order_id", "product_id"},
     *             @OA\Property(property="order_id", type="integer"),
     *             @OA\Property(property="product_id", type="integer"),
     *             @OA\Property(property="quantity", type="integer"),
     *             @OA\Property(property="price", type="number", format="double"),
     *             @OA\Property(property="subtotal", type="number", format="double")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Order item created successfully"
     *     )
     * )
     */
public function create(OrderItemRequest $request)
    {
        try {
            $data = $request->validated();

            $data['active'] = 1;

            $orderitem = OrderItem::create($data);

            return $this->sendResponse($orderitem, 201, 'Order item created');
        } catch (Exception $e) {
            return $this->sendError('Failed to create order item', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/orderitem/{id}",
     *     tags={"Order Item"},
     *     summary="Update an existing order item",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="order_id", type="integer"),
     *             @OA\Property(property="product_id", type="integer"),
     *             @OA\Property(property="quantity", type="integer"),
     *             @OA\Property(property="price", type="number", format="double"),
     *             @OA\Property(property="subtotal", type="number", format="double")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Order item updated successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Order item not found"
     *     )
     * )
     */
public function update(OrderItemRequest $request, $id)
    {
        try {
            $orderitem = OrderItem::find($id);

            if (!$orderitem) {
                return $this->sendResponse(!$orderitem, 404, 'Order item not found');
            }

            $validated = $request->validated();

            $orderitem->update($validated);

            return $this->sendResponse($orderitem, 200, "Update successful");
        } catch (Exception $e) {
            return $this->sendError('Failed to update order item', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/orderitem/{id}",
     *     tags={"Order Item"},
     *     summary="Delete an order item",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Order item successful delete"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Order item not found"
     *     )
     * )
     */
public function visible($id)
    {
        try {
            $orderitem = OrderItem::find($id);
            if (!$orderitem) {
                return $this->sendError('Order item Not found', 404);
            }

            $orderitem->active = $orderitem->active == 1 ? 0 : 1;
            $orderitem->save();

            return $this->sendResponse([], 200, "Order item delete successful");
        } catch (Exception $e) {
            return $this->sendError('Failed to delete the order item', 500, [$e->getMessage()]);
        }
    }
}
