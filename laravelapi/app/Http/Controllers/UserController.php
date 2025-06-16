<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\UserModel;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/user",
     *     tags={"User"},
     *     summary="Get all active users",
     *     @OA\Response(
     *         response=200,
     *         description="List of users"
     *     )
     * )
     */
    public function index()
    {
        try {
            $user = UserModel::with([
                'image'
            ])->where('active', 1)->get();

            return $this->sendResponse($user);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve user', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/user/{id}",
     *     tags={"User"},
     *     summary="Get user by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User details"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found"
     *     )
     * )
     */
    public function show($id)
    {
        try {
            $user = UserModel::with([
                'image'
            ])->where('id', $id)->where('active', 1)->first();

            if (!$user) {
                return $this->sendResponse(!$user, 404, 'User not found');
            }

            return $this->sendResponse($user);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve user', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/user",
     *     tags={"User"},
     *     summary="Create a new user",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email", "password"},
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="image", type="integer", nullable=true, example=1),
     *             @OA\Property(property="email", type="string", format="email", example="john@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="secure123"),
     *             @OA\Property(property="phone", type="string", nullable=true, example="012345678"),
     *             @OA\Property(property="address", type="string", nullable=true, example="Phnom Penh"),
     *             @OA\Property(property="role", type="string", enum={"customer","admin","vendor"}, example="customer")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="User created successfully"
     *     )
     * )
     */
    public function create(UserRequest $request)
    {
        try {
            $data = $request->validated();

            $data['active'] = 1;

            $user = UserModel::create($data);

            return $this->sendResponse($user, 201, 'User created');
        } catch (Exception $e) {
            return $this->sendError('Failed to create user', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/user/{id}",
     *     tags={"User"},
     *     summary="Update a user by ID",
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
     *             @OA\Property(property="image", type="integer"),
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="password", type="string", format="password"),
     *             @OA\Property(property="phone", type="string", nullable=true),
     *             @OA\Property(property="address", type="string", nullable=true),
     *             @OA\Property(property="role", type="string", enum={"customer","admin","vendor"})
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User updated successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found"
     *     )
     * )
     */
    public function update(UserRequest $request, $id)
    {
        try {
            $user = UserModel::find($id);

            if (!$user) {
                return $this->sendResponse(!$user, 404, 'User not found');
            }

            $validated = $request->validated();

            $user->update($validated);

            return $this->sendResponse($user, 200, "Update successful");
        } catch (Exception $e) {
            return $this->sendError('Failed to update user', 500, [$e->getMessage()]);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/user/{id}",
     *     tags={"User"},
     *     summary="Delete user",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User visibility toggled"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found"
     *     )
     * )
     */
    public function visible($id)
    {
        try {
            $user = UserModel::find($id);
            if (!$user) {
                return $this->sendError('User Not found', 404);
            }

            $user->active = $user->active == 1 ? 0 : 1;
            $user->save();

            return $this->sendResponse([], 200, "User delete successful");
        } catch (Exception $e) {
            return $this->sendError('Failed to delete the user', 500, [$e->getMessage()]);
        }
    }
}
