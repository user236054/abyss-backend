<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfilRequest;
use App\Http\Requests\UpdateProfilRequest;
use App\Models\Profil;
use App\Http\Resources\ProfilResource;
use Spatie\QueryBuilder\QueryBuilder;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data = Profil::all();
         
        return response()->json([
        'message' => 'Donnée retourné avec succès',
        'data' => ProfilResource::collection($data),
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfilRequest $request)
    {
        $validated = $request->validated();
        //$validated['user_id'] = $request->user()->id;

        if($request->hasFile('avatar')) {
        $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        Profil::create($validated);

        return response()->json([
        'message' => 'Profil personnalisé avec succès',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profil $profil)
    {
        return response()->json([
        'message' => 'Donnée retourné avec succès',
        'data' => new ProfilResource($profil),
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfilRequest $request, Profil $profil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profil $profil)
    {
        //J'ai pas besoin d'un méthode delete pour le profil car grace à ma contrainte de clé étrangère, un utilisateur supprimé esuprrime automatiquement son profil
    }
}
