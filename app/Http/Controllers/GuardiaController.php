<?php

namespace App\Http\Controllers;

use App\Models\Guardia;
use App\Models\Personal;
use App\Models\Horario;
use Illuminate\Http\Request;
use App\Http\Requests\GuardiaFormRequest;

class GuardiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guardias=Guardia::select('*','horarios.personal_id as personal','horarios.fecha as inicio','horarios.fecha_fin as fin','areas.name as area')
            ->join('horarios','horarios.id','jornada_id')
            ->join('areas','areas.id','horarios.area_id')
            ->get();
        $personal=Personal::select()->pluck('name','id')->toArray();
        return view('guardias.index',compact('guardias','personal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horarios=Horario::select('*','personal.name as personal','areas.name as area','turnos.descripcion as turno')
            ->join('personal','personal.id','personal_id')
            ->join('areas','areas.id','area_id')
            ->join('turnos','turnos.id','turno_id')
            ->get();
        $personal=Personal::orderBy('name')->get();
        return view('guardias.create',compact('horarios','personal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardiaFormRequest $request)
    {
        $guardia=new Guardia;
        $guardia->jornada_id=$request->input('horario');
        $guardia->personal_id=$request->input('personal');
        $guardia->fecha_inicio=$request->input('inicio');
        $guardia->fecha_fin=$request->input('fin');
        $guardia->status='ACTIVO';
        $guardia->save();
        return redirect()->route('guardias.index')->with('mensaje','La guardia se creo correctamente, revise el calendario');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guardia  $guardia
     * @return \Illuminate\Http\Response
     */
    public function show(Guardia $guardia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guardia  $guardia
     * @return \Illuminate\Http\Response
     */
    public function edit(Guardia $guardia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guardia  $guardia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guardia $guardia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guardia  $guardia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guardia $guardia)
    {
        $guardia->delete();
        return redirect()->route('guardias.index')->with('mensaje','Registro Eliminado');
    }
}
