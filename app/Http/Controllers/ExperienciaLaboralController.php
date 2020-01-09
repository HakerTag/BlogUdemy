<?php

namespace App\Http\Controllers;

use App\ExperienciaLaboral;
use App\User;
use Illuminate\Http\Request;

class ExperienciaLaboralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('experienciaLab.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exp = ExperienciaLaboral::create($request->all());
            if (auth()->check())
            {
                auth()->user()->expLaborales()->save($exp);
            }

            return redirect()->route('usuarios.index')->with('info', 'Experiencia Agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExperienciaLaboral  $experienciaLaboral
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exp = ExperienciaLaboral::findOrFail($id);
        $user = User::with('expLaborales')->where('id', $id)->get();
        // $user = ExperienciaLaboral::where('id', $id);
        // dd($user);
        return view('experienciaLab.show', compact('exp', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExperienciaLaboral  $experienciaLaboral
     * @return \Illuminate\Http\Response
     */
    public function edit(ExperienciaLaboral $experienciaLaboral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExperienciaLaboral  $experienciaLaboral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExperienciaLaboral $experienciaLaboral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExperienciaLaboral  $experienciaLaboral
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExperienciaLaboral $experienciaLaboral)
    {
        //
    }
}
