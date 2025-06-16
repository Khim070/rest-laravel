<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Exception;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/review",
     *     tags={"Review"},
     *     summary="Get all reviews",
     *     @OA\Response(
     *         response=200,
     *         description="List of reviews"
     *     )
     * )
     */
    public function index()
    {
        try {
            $review = Review::with([
                'user',
                'product'
            ])->where('active', 1)->get();

            return $this->sendResponse($review);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve review', 500, [$e->getMessage()]);
        }
    }


    /**
     * @OA\Get(
     *     path="/api/review/{id}",
     *     tags={"Review"},
     *     summary="Get a review by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Review details"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Review not found"
     *     )
     * )
     */
    public function show($id)
    {
        try {
            $review = Review::with([
                'user',
                'product'
            ])->where('id', $id)->where('active', 1)->first();

            if (!$review) {
                return $this->sendResponse(!$review, 404, 'Review not found');
            }

            return $this->sendResponse($review);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve review', 500, [$e->getMessage()]);
        }
    }


    /**
     * @OA\Post(
     *     path="/api/review",
     *     tags={"Review"},
     *     summary="Create a new review",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"user_id", "product_id"},
     *             @OA\Property(property="user_id", type="integer"),
     *             @OA\Property(property="product_id", type="integer"),
     *             @OA\Property(property="rating", type="number", format="double"),
     *             @OA\Property(property="comment", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Review created"
     *     )
     * )
     */
    public function create(ReviewRequest $request)
    {
        try {
            $data = $request->validated();

            $data['display'] = 0;
            $data['active'] = 1;

            $review = Review::create($data);

            return $this->sendResponse($review, 201, 'Review created');
        } catch (Exception $e) {
            return $this->sendError('Failed to create review', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/review/{id}",
     *     tags={"Review"},
     *     summary="Update a review by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="rating", type="number", format="double"),
     *             @OA\Property(property="comment", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Review updated successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Review not found"
     *     )
     * )
     */
    public function update(ReviewRequest $request, $id)
    {
        try {
            $review = Review::find($id);

            if (!$review) {
                return $this->sendResponse(!$review, 404, 'Review not found');
            }

            $validated = $request->validated();

            $review->update($validated);

            return $this->sendResponse($review, 200, "Update successful");
        } catch (Exception $e) {
            return $this->sendError('Failed to update review', 500, [$e->getMessage()]);
        }
    }


    /**
     * @OA\Put(
     *     path="/api/review/{id}",
     *     tags={"Review"},
     *     summary="Delete a review",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Review delete successful"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Review not found"
     *     )
     * )
     */
    public function visible($id)
    {
        try {
            $review = Review::find($id);
            if (!$review) {
                return $this->sendError('Review Not found', 404);
            }

            $review->active = $review->active == 1 ? 0 : 1;
            $review->save();

            return $this->sendResponse([], 200, "Review delete successful");
        } catch (Exception $e) {
            return $this->sendError('Failed to delete the review', 500, [$e->getMessage()]);
        }
    }
}
