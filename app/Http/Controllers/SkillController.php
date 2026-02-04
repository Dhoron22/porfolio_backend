<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::ordered()->get();
        return response()->json($skills);
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
    public function store(StoreSkillRequest $request)
    {
        $skill = Skill::create($request->validated());

        return response()->json([
            'message' => 'Habilidad creada exitosamente',
            'data' => $skill
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $skill = Skill::find($id);

        if (!$skill) {
            return response()->json(['message' => 'Habilidad no encontrada'], 404);
        }
            return response()->json($skill);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkillRequest $request, $id)
    {
        $skill = Skill::find($id);

        if (!$skill) {
            return response()->json(['message' => 'Habilidad no encontrada'], 404);
        }

        $skill->update($request->validated());

        return response()->json([
            'message' => 'Habilidad actualizada exitosamente',
            'data' => $skill
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $skill = Skill::find($id);

        if (!$skill) {
            return response()->json(['message' => 'Habilidad no encontrada'], 404);
        }

        $skill->delete();

        return response()->json([
            'message' => 'Habilidad eliminada exitosamente'
        ]);
    }
}
