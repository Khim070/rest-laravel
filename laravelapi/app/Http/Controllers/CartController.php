<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Cart;
use Exception;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/cart",
     *     tags={"Cart"},
     *     summary="Get all cart items",
     *     @OA\Response(
     *         response=200,
     *         description="List of cart items"
     *     )
     * )
     */
    public function index()
    {
        try {
            $cart = Cart::with([
                'user',
                'product'
            ])->where('active', 1)->get();

            return $this->sendResponse($cart);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve user', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/cart/{id}",
     *     tags={"Cart"},
     *     summary="Get cart item by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Cart item details"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Cart item not found"
     *     )
     * )
     */
    public function show($id)
    {
        try {
            $cart = Cart::with([
                'user',
                'product'
            ])->where('id', $id)->where('active', 1)->first();

            if (!$cart) {
                return $this->sendResponse(!$cart, 404, 'Cart not found');
            }

            return $this->sendResponse($cart);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve cart', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/cart",
     *     tags={"Cart"},
     *     summary="Add a new item to the cart",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"user_id", "product_id"},
     *             @OA\Property(property="user_id", type="integer"),
     *             @OA\Property(property="product_id", type="integer"),
     *             @OA\Property(property="quantity", type="integer")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Cart item created"
     *     )
     * )
     */
    public function create(CartRequest $request)
    {
        try {
            $data = $request->validated();

            $data['active'] = 1;

            $cart = Cart::create($data);

            return $this->sendResponse($cart, 201, 'Cart created');
        } catch (Exception $e) {
            return $this->sendError('Failed to create cart', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/cart/{id}",
     *     tags={"Cart"},
     *     summary="Update an existing cart item",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="quantity", type="integer")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Cart item updated successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Cart item not found"
     *     )
     * )
     */
    public function update(CartRequest $request, $id)
    {
        try {
            $cart = Cart::find($id);

            if (!$cart) {
                return $this->sendResponse(!$cart, 404, 'Cart not found');
            }

            $validated = $request->validated();

            $cart->update($validated);

            return $this->sendResponse($cart, 200, "Update successful");
        } catch (Exception $e) {
            return $this->sendError('Failed to update cart', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/cart/{id}",
     *     tags={"Cart"},
     *     summary="Delete a cart of item",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Cart delete successful"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Cart not found"
     *     )
     * )
     */
    public function visible($id)
    {
        try {
            $cart = Cart::find($id);
            if (!$cart) {
                return $this->sendError('Cart Not found', 404);
            }

            $cart->active = $cart->active == 1 ? 0 : 1;
            $cart->save();

            return $this->sendResponse([], 200, "Cart delete successful");
        } catch (Exception $e) {
            return $this->sendError('Failed to delete the cart', 500, [$e->getMessage()]);
        }
    }
}
