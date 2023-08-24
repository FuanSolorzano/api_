<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $persona=Persona::all();
        return response()->json(['data'=>$persona]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $persona=Persona::create([
            'name' =>$request->name,
            'description' =>$request->description,
            'location' =>$request->location,
            'followers' =>$request->followers,
        ]);
        return response()->json(['data'=>'Person Successfly Correction']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
         $persona = Persona::find($id);

    if (!$persona) {
        return response()->json(['message' => 'Persona no encontrada'], 404);
    }

    return response()->json($persona);
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $persona = Persona::find($id);

    if (!$persona) {
        return response()->json(['message' => 'Persona no encontrada'], 404);
    }

    $persona->update($request->all());

    return response()->json(['message' => 'Persona actualizada correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $persona=Persona::find($id)->delete();
        return response()->json(['data'=>'Music Deleted Correction']);
    }
}
