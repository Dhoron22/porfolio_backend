<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::ordered()->get();
        return response()->json($educations);}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEducationRequest $request)
    {
        $education = Education::create($request->validated());

        return response()->json([
            'message' => 'Educacion creada exitosamente',
            'data' => $education
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $education = Education::findOrFail($id);

        if (!$education){
            return response()->json([
                'message' => 'Educacion no encontrada'
            ],404);
        }

        return response()->json($education);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEducationRequest $request, $id)
    {
        $education = Education::findOrFail($id);

        if (!$education){
            return response()->json([
                'message' => 'Educacion no encontrada'
            ],404);
        }

        $education->update($request->validated());

        return response()->json([
            'message' => 'Educacion actualizada exitosamente',
            'data' => $education
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $education = Education::find($id);

    if (!$education){
        return response()->json([
            'message' => 'Educacion no encontrada'
        ],404);
    }

    $education->delete();
    return response()->json([
        'message' => 'Educacion eliminada exitosamente'
    ]);
    }
}
