<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectsRequest;
use App\Http\Requests\UpdateProjectsRequest;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Listar todos los proyectos
     * GET/api /projects
     */
    public function index()
    {
        $projects = Projects::all(); //Obtiene todos los proyectos
        return response()->json($projects);
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
    /**Crear un nuevo proyecto
     * POST /api/projects
     */
    public function store(StoreProjectsRequest $request) //Validar los datos que llegan a traves de un formrequest
    {
        $projects = Projects::create($request->validated()); //Crear un nuevo proyecto con los datos validados

        return response()->json([
            'message'=>'Proyecto creado con exito',
            'project'=>$projects
        ],201);
    }

    /**
     * Display the specified resource.
     * Mostrar un proyecto especifico
     * GET /api/projects/{id}
     */
    public function show(Projects $projects)
    {
        return response()->json($projects);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projects $projects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * Actualizar un proyecto especifico
     * PUT/PATCH/api/projects/{id}
     */
    public function update(UpdateProjectsRequest $request, Projects $projects)
    {
        //La validacion ya se hizo automaticamente
        $projects->update($request->validated());
        return response()->json([
            'message'=>'Proyecto actualizado con exito',
            'project'=>$projects
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * Elmina un proyecto
     * DELETE/api/projects/{id}
     */
    public function destroy(Projects $projects)
    {
        $projects->delete();
        return response()->json([
            'message'=>'Proyecto eliminado con exito'
        ]);
    }
}
