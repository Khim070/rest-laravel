<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use Exception;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/coupon",
     *     tags={"Coupon"},
     *     summary="Get all coupons",
     *     @OA\Response(
     *         response=200,
     *         description="List of coupons"
     *     )
     * )
     */
    public function index()
    {
        try {
            $coupon = Coupon::where('active', 1)->get();

            return $this->sendResponse($coupon);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve coupon', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/coupon/{id}",
     *     tags={"Coupon"},
     *     summary="Get a coupon by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Coupon found"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Coupon not found"
     *     )
     * )
     */
    public function show($id)
    {
        try {
            $coupon = Coupon::where('id', $id)->where('active', 1)->first();

            if (!$coupon) {
                return $this->sendResponse(!$coupon, 404, 'Coupon not found');
            }

            return $this->sendResponse($coupon);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve coupon', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/coupon",
     *     tags={"Coupon"},
     *     summary="Create a new coupon",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"code"},
     *             @OA\Property(property="code", type="string"),
     *             @OA\Property(property="discount", type="number", format="double"),
     *             @OA\Property(property="expires_at", type="string", format="date")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Coupon created"
     *     )
     * )
     */
    public function create(CouponRequest $request)
    {
        try {
            $data = $request->validated();

            $data['active'] = 1;

            $coupon = Coupon::create($data);

            return $this->sendResponse($coupon, 201, 'Coupon created');
        } catch (Exception $e) {
            return $this->sendError('Failed to create coupon', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/coupon/{id}",
     *     tags={"Coupon"},
     *     summary="Update an existing coupon",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="code", type="string"),
     *             @OA\Property(property="discount", type="number", format="double"),
     *             @OA\Property(property="expires_at", type="string", format="date")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Coupon updated"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Coupon not found"
     *     )
     * )
     */
    public function update(CouponRequest $request, $id)
    {
        try {
            $coupon = Coupon::find($id);

            if (!$coupon) {
                return $this->sendResponse(!$coupon, 404, 'Coupon not found');
            }

            $validated = $request->validated();

            $coupon->update($validated);

            return $this->sendResponse($coupon, 200, "Update successful");
        } catch (Exception $e) {
            return $this->sendError('Failed to update coupon', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/coupon/{id}",
     *     tags={"Coupon"},
     *     summary="Delete a coupon",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Coupon delete successful"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Coupon not found"
     *     )
     * )
     */
    public function visible($id)
    {
        try {
            $coupon = Coupon::find($id);
            if (!$coupon) {
                return $this->sendError('Coupon Not found', 404);
            }

            $coupon->active = $coupon->active == 1 ? 0 : 1;
            $coupon->save();

            return $this->sendResponse([], 200, "Coupon delete successful");
        } catch (Exception $e) {
            return $this->sendError('Failed to delete the coupon', 500, [$e->getMessage()]);
        }
    }
}
