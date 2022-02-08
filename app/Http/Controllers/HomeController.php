<?php

namespace App\Http\Controllers;

use App\Models\Automovil;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $automoviles = Automovil::all();
        return response()->json($automoviles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $automovil = Automovil::create([
            'auto_name' => $request['nombre'],
            'auto_modelo' => $request['modelo'],
            'auto_marca' => $request['marca'],
            'auto_departamento' => $request['departamento']
        ]);
        return response()->json($automovil);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $automovil = Automovil::find($id);
        return response()->json($automovil);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $automovil = Automovil::find($id);
        $automovil->update([
            'auto_name' => $request['nombre'],
            'auto_modelo' => $request['modelo'],
            'auto_marca' => $request['marca'],
            'auto_departamento' => $request['departamento']
        ]);
        $automovil->save();
        return response()->json($automovil);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $automovil = Automovil::find($id);
        $automovil->delete();
        return response()->json([
            'mensaje' => 'Automovil eliminado'
        ]);
    }
}
