<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['status' => 'ok']);
    }

<<<<<<< HEAD
    /**
     * Store a newly created resource in storage.
     *

     */
=======

 
>>>>>>> 14aab7cae167213c06e56eb6f52a51b7f9b5738e
    public function store(Request $request): JsonResponse
    {
        Log::info($request->all());
        $validated = $request->validate([
            'theme' => 'required|string|max:255',
            'post' => 'required|string',
            'date' => 'required|date_format:Y-m-d',
            'url' => 'required|string',
            'media' => 'required|string',

        ]);

        // Сохранение
        $event = Posts::create($validated);

        return response()->json([
            'message' => 'Событие успешно создано!',
            'data' => $event
        ], 201);
           

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
