<?php

namespace App\Http\Controllers\administrador;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropiedadRequest;
use App\Http\Requests\UpdatePropiedadRequest;
use App\Models\Propiedad;

class PropiedadController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propiedades = Propiedad::withTrashed()->get();
        return view('propiedades.index')->with('propiedades', $propiedades);
    }

    /**
     * Show the form for creating a new resource.
     *t
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(StorePropiedadRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function show(Propiedad $propiedad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function edit(Propiedad $propiedad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePropiedadRequest  $request
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropiedadRequest $request, Propiedad $propiedad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propiedad $propiedad)
    {
        //
    }
}
