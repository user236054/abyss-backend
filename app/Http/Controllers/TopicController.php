<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Models\Topic;
use App\Http\Resources\TopicResource;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Topic::all();
        return response()->json([
        'message' => 'Donnée retourné avec succès',
        'data' => TopicResource::collection($data),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTopicRequest $request)
    {
        $validated = $request->validated();

        Topic::create($validated);
        return response()->json([
        'message' => 'Topic crée avec succès',
        
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        return response()->json([
        'message' => 'Topic retourné avec succès',
        'topic' => new TopicResource($topic),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
    $topic->delete();

    return response()->json([
        'message' => 'Topic supprimé avec succès',
        'topic' => $topic,
        ]);
        
    }
}
