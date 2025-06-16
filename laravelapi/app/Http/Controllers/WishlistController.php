<?php

namespace App\Http\Controllers;

use App\Http\Requests\WishlistRequest;
use App\Models\Wishlist;
use Exception;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/wishlist",
     *     tags={"Wishlist"},
     *     summary="Get all wishlist items",
     *     @OA\Response(
     *         response=200,
     *         description="List of wishlist items"
     *     )
     * )
     */
    public function index()
    {
        try {
            $wishlist = Wishlist::with([
                'user',
                'product'
            ])->where('active', 1)->get();

            return $this->sendResponse($wishlist);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve wishlist', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/wishlist/{id}",
     *     tags={"Wishlist"},
     *     summary="Get wishlist item by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Wishlist item details"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Wishlist item not found"
     *     )
     * )
     */
    public function show($id)
    {
        try {
            $wishlist = Wishlist::with([
                'user',
                'product'
            ])->where('id', $id)->where('active', 1)->first();

            if (!$wishlist) {
                return $this->sendResponse(!$wishlist, 404, 'Wishlist not found');
            }

            return $this->sendResponse($wishlist);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve wishlist', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/wishlist",
     *     tags={"Wishlist"},
     *     summary="Add a new item to the wishlist",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"user_id", "product_id"},
     *             @OA\Property(property="user_id", type="integer"),
     *             @OA\Property(property="product_id", type="integer")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Wishlist item created"
     *     )
     * )
     */
    public function create(WishlistRequest $request)
    {
        try {
            $data = $request->validated();

            $data['active'] = 1;

            $wishlist = Wishlist::create($data);

            return $this->sendResponse($wishlist, 201, 'Wishlist created');
        } catch (Exception $e) {
            return $this->sendError('Failed to create wishlist', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/wishlist/{id}",
     *     tags={"Wishlist"},
     *     summary="Update an existing wishlist item",
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
     *             @OA\Property(property="product_id", type="integer")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Wishlist item updated successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Wishlist item not found"
     *     )
     * )
     */
    public function update(WishlistRequest $request, $id)
    {
        try {
            $wishlist = Wishlist::find($id);

            if (!$wishlist) {
                return $this->sendResponse(!$wishlist, 404, 'Wishlist not found');
            }

            $validated = $request->validated();

            $wishlist->update($validated);

            return $this->sendResponse($wishlist, 200, "Update successful");
        } catch (Exception $e) {
            return $this->sendError('Failed to update wishlist', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/wishlist/{id}",
     *     tags={"Wishlist"},
     *     summary="Delete a wishlist item",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Wishlist item delete successful"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Wishlist item not found"
     *     )
     * )
     */
    public function visible($id)
    {
        try {
            $wishlist = Wishlist::find($id);
            if (!$wishlist) {
                return $this->sendError('Wishlist Not found', 404);
            }

            $wishlist->active = $wishlist->active == 1 ? 0 : 1;
            $wishlist->save();

            return $this->sendResponse([], 200, "Wishlist delete successful");
        } catch (Exception $e) {
            return $this->sendError('Failed to delete the wishlist', 500, [$e->getMessage()]);
        }
    }
}
