<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return response()->json([
        'message' => 'Donnée retourné avec succès',
        'data' => UserResource::collection($data),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        User::create($validated);

        return response()->json([
        'message' => 'Utilisateur enregistré avec succès',
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json([
        'message' => 'User retournée avec succès',
        'topic' => new UserResource($user),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
        'message' => 'User supprimer avec succès',
        'topic' => $user,
        ]);
    }
}
