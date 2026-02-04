<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkExperienceRequest;
use App\Http\Requests\UpdateWorkExperienceRequest;
use App\Models\WorkExperience;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = WorkExperience::ordered()->get();
        return response()->json($experiences);
    }

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
    public function store(StoreWorkExperienceRequest $request)
    {
        $experience = WorkExperience::create($request->validated());

        return response()->json([
            'message' => 'Experiencia laboral creada exitosamente',
            'data' => $experience
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $experience = WorkExperience::find($id);
        if (!$experience) {
            return response()->json([
                'message' => 'Experiencia laboral no encontrada'
                ], 404);
        }
        return response()->json($experience);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkExperience $workExperience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkExperienceRequest $request, $id)
    {
        $experience = WorkExperience::find($id);

        if (!$experience){
            return response()->json([
                'message' => 'Experiencia laboral no encontrada'
            ], 404);
        }

        $experience->update($request->validated());

        return response()->json([
            'message' => 'Experiencia laboral actualizada exitosamente',
            'data' => $experience
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $experience = WorkExperience::find($id);

        if (!$experience){
            return response()->json([
                'message' => 'Experiencia laboral no encontrada'
            ], 404);
        }
        $experience->delete();
        return response()->json([
            'message' =>'Experiencia laboral eliminada exitosamente'
        ]);
    }

}
