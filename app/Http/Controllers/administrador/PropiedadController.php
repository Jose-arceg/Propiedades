<?php

namespace App\Http\Controllers\administrador;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropiedadRequest;
use App\Http\Requests\UpdatePropiedadRequest;
use App\Models\Propiedad;

class PropiedadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propiedades = Propiedad::all();
        return view('propiedades.index')->with('propiedades', $propiedades);
    }

    /**
     * Show the form for creating a new resource.
     *t
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $user = Auth::user();
        return view('propiedades.create') /*->with('user', $user)*/;
    }

    public function store(StorePropiedadRequest $request)
    {
        Propiedad::create($request->validated());
        return redirect('propiedades')->withSuccess('Propiedad agregada con exito');
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
