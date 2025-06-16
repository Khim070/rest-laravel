<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/payment",
     *     tags={"Payment"},
     *     summary="Get all payments",
     *     @OA\Response(
     *         response=200,
     *         description="List of payments"
     *     )
     * )
     */
    public function index()
    {
        try {
            $payment = Payment::with([
                'orderproduct',
                'user'
            ])->where('active', 1)->get();

            return $this->sendResponse($payment);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve payment', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/payment/{id}",
     *     tags={"Payment"},
     *     summary="Get a payment by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Payment details"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Payment not found"
     *     )
     * )
     */
    public function show($id)
    {
        try {
            $payment = Payment::with([
                'orderproduct',
                'user'
            ])->where('id', $id)->where('active', 1)->first();

            if (!$payment) {
                return $this->sendResponse(!$payment, 404, 'Payment not found');
            }

            return $this->sendResponse($payment);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve payment', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/payment",
     *     tags={"Payment"},
     *     summary="Create a new payment",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"order_id", "user_id"},
     *             @OA\Property(property="order_id", type="integer"),
     *             @OA\Property(property="user_id", type="integer"),
     *             @OA\Property(property="amount", type="number", format="double"),
     *             @OA\Property(property="payment_method", type="string", enum={"credit_card","paypal","bank_transfer"}),
     *             @OA\Property(property="status", type="string", enum={"pending", "completed", "failed", "refunded"})
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Payment created"
     *     )
     * )
     */
    public function create(PaymentRequest $request)
    {
        try {
            $data = $request->validated();

            $data['active'] = 1;
            $data['display'] = 0;

            $payment = Payment::create($data);

            return $this->sendResponse($payment, 201, 'Payment created');
        } catch (Exception $e) {
            return $this->sendError('Failed to create payment', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/payment/{id}",
     *     tags={"Payment"},
     *     summary="Update a payment by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="amount", type="number", format="double"),
     *             @OA\Property(property="payment_method", type="string", enum={"credit_card","paypal","bank_transfer"}),
     *             @OA\Property(property="status", type="string", enum={"pending", "completed", "failed", "refunded"})
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Payment updated successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Payment not found"
     *     )
     * )
     */
    public function update(PaymentRequest $request, $id)
    {
        try {
            $payment = Payment::find($id);

            if (!$payment) {
                return $this->sendResponse(!$payment, 404, 'Payment not found');
            }

            $validated = $request->validated();

            $payment->update($validated);

            return $this->sendResponse($payment, 200, "Update successful");
        } catch (Exception $e) {
            return $this->sendError('Failed to update payment', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/payment/{id}",
     *     tags={"Payment"},
     *     summary="Delete a payment",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Payment delete successful"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Payment not found"
     *     )
     * )
     */
    public function visible($id)
    {
        try {
            $payment = Payment::find($id);
            if (!$payment) {
                return $this->sendError('Payment Not found', 404);
            }

            $payment->active = $payment->active == 1 ? 0 : 1;
            $payment->save();

            return $this->sendResponse([], 200, "Payment delete successful");
        } catch (Exception $e) {
            return $this->sendError('Failed to delete the payment', 500, [$e->getMessage()]);
        }
    }
}
