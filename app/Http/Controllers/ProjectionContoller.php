<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectionContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return \response()->json(Projection::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            return response()->json(Projection::create($request->all()));
        } catch (\Throwable $th) {
           return \response()->json($th->getMessage(),500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $projection = Projection::findOrFail($id);
        return \response()->json($projection);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $projection = Projection::findOrFail($id);
            $projection->update($request->all());
            return response()->json($projection);
        } catch (\Throwable $th) {
           return \response()->json($th->getMessage(),500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $projection = Projection::findOrFail($id);
            $projection->delete();
            return \response()->noContent();
         } catch (\Throwable $th) {
            return \response()->json($th->getMessage(),500);
         }
    }
}
