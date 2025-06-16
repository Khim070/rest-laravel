<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingRequest;
use App\Models\Shipping;
use Exception;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/shipping",
     *     tags={"Shipping"},
     *     summary="Get all shipping records",
     *     @OA\Response(
     *         response=200,
     *         description="List of shipping records"
     *     )
     * )
     */
    public function index()
    {
        try {
            $shipping = Shipping::with([
                'orderproduct',
                'user'
            ])->where('active', 1)->get();

            return $this->sendResponse($shipping);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve shipping', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/shipping/{id}",
     *     tags={"Shipping"},
     *     summary="Get a specific shipping record by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Shipping details"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Shipping not found"
     *     )
     * )
     */
    public function show($id)
    {
        try {
            $shipping = Shipping::with([
                'orderproduct',
                'user'
            ])->where('id', $id)->where('active', 1)->first();

            if (!$shipping) {
                return $this->sendResponse(!$shipping, 404, 'Shipping not found');
            }

            return $this->sendResponse($shipping);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve shipping', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/shipping",
     *     tags={"Shipping"},
     *     summary="Create a new shipping record",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"order_id", "user_id"},
     *             @OA\Property(property="order_id", type="integer"),
     *             @OA\Property(property="user_id", type="integer"),
     *             @OA\Property(property="address", type="string"),
     *             @OA\Property(property="status", type="string", enum={"pending", "shipped", "delivered"}),
     *             @OA\Property(property="tracking_number", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Shipping created"
     *     )
     * )
     */
    public function create(ShippingRequest $request)
    {
        try {
            $data = $request->validated();

            $data['active'] = 1;
            $data['display'] = 0;

            $shipping = Shipping::create($data);

            return $this->sendResponse($shipping, 201, 'Shipping created');
        } catch (Exception $e) {
            return $this->sendError('Failed to create shipping', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/shipping/{id}",
     *     tags={"Shipping"},
     *     summary="Update a shipping record by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="address", type="string"),
     *             @OA\Property(property="status", type="string", enum={"pending", "shipped", "delivered"}),
     *             @OA\Property(property="tracking_number", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Shipping updated successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Shipping not found"
     *     )
     * )
     */
    public function update(ShippingRequest $request, $id)
    {
        try {
            $shipping = Shipping::find($id);

            if (!$shipping) {
                return $this->sendResponse(!$shipping, 404, 'Shipping not found');
            }

            $validated = $request->validated();

            $shipping->update($validated);

            return $this->sendResponse($shipping, 200, "Update successful");
        } catch (Exception $e) {
            return $this->sendError('Failed to update shipping', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/shipping/{id}",
     *     tags={"Shipping"},
     *     summary="Delete a shipping record",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Shipping delete successful"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Shipping not found"
     *     )
     * )
     */
    public function visible($id)
        {
            try {
                $shipping = Shipping::find($id);
                if (!$shipping) {
                    return $this->sendError('Shipping Not found', 404);
                }

                $shipping->active = $shipping->active == 1 ? 0 : 1;
                $shipping->save();

                return $this->sendResponse([], 200, "Shipping delete successful");
            } catch (Exception $e) {
                return $this->sendError('Failed to delete the shipping', 500, [$e->getMessage()]);
            }
        }
    }
