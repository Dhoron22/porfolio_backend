<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonalInfoRequest;
use App\Http\Requests\UpdatePersonalInfoRequest;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\HttpCache\Store;

class PersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtener el primer (y unico) registro
        $personalInfo = PersonalInfo :: first();
        if (!$personalInfo){
            return response()->json([
                'message' => 'No se encontro informacion personal'
            ],404);
        }
        return response()->json($personalInfo);
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
    public function store(StorePersonalInfoRequest $request)
    {
        //Verificar que no exista ya un registro
        if (PersonalInfo::exists()) {
            return response()->json([
                'message' => 'Ya existe informacion personal, Use PUT para actualizarla'
            ], 400);
        }
            $personalInfo = PersonalInfo::create($request->validated());

        return response()->json([
            'message' => 'Informacion personal creada exitosamente',
            'data' => $personalInfo
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $personalInfo = PersonalInfo::find($id);
        if (!$personalInfo) {
            return response()->json([
                'message' => 'Informacion personal no encontrada'
            ], 404);
        }
        return response()->json($personalInfo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PersonalInfo $personalInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonalInfoRequest $request, $id)
    {
        $personalInfo = PersonalInfo::find($id);
        if(!$personalInfo){
            return response()->json([
                'message' => 'Informacion personal no encontrada'
            ],404);
        }
        $personalInfo->update($request->validated());
        return response()->json([
            'message' => 'Informacion personal actualizada exitosamente',
            'data' => $personalInfo
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $personalInfo = PersonalInfo::find($id);
        if(!$personalInfo)
            {
                return response()->json([
                    'message' => 'Informacion personal no encontrada'
                ],404);
            }
        $personalInfo->delete();
        return response()->json([
            'message' => 'Informacion personal eliminada exitosamente'
        ]);
    }
}
