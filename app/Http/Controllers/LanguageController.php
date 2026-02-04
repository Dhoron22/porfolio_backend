<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::ordered()->get();
        return response()->json($languages);
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
    public function store(StoreLanguageRequest $request)
    {
        $language = Language::create($request->validated());

        return response()->json([
            'message' => 'Idioma creado exitosamente.',
            'data' => $language,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $language = Language::find($id);
        if (!$language) {
            return response()->json(['message' => 'Idioma no encontrado'], 404);
        }
        return response()->json($language);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLanguageRequest $request, $id)
    {
        $language = Language::find($id);

        if (!$language) {
            return response()->json(['message' => 'Idioma no encontrado'], 404);
        }

        $language->update($request->validated());

        return response()->json([
            'message' => 'Idioma actualizado exitosamente.',
            'data' => $language,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $language = Language::find($id);
        if (!$language) {
            return response()->json(['message' => 'Idioma no encontrado'], 404);
        }
        $language->delete();
        return response()->json(['message' => 'Idioma eliminado exitosamente.']);
    }
}
