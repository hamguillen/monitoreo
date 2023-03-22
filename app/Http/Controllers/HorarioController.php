<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Area;
use App\Models\Personal;
use App\Models\Turno;
use Illuminate\Http\Request;
use App\Http\Requests\HorarioFormRequest;
use DateTime;
class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos=array();
        $className=array('badge bg-primary','badge bg-info','badge bg-success','badge bg-warning');
        $horarios=Horario::select('*','areas.name as area','personal.name as personal','turnos.descripcion as turno','turnos.inicio as inicio','turnos.fin as fin')
                    ->join('areas','areas.id','=','area_id')
                    ->join('personal','personal.id','=','personal_id')
                    ->join('turnos','turnos.id','=','turno_id')
                    ->get();
        $nEvent=0;$temp='';$j=0;
        foreach($horarios as $horario)
        {
            $datetime1 = new DateTime($horario->fecha);
            $datetime2 = new DateTime($horario->fecha_fin);
            $interval = $datetime1->diff($datetime2);
            $days=intval($interval->format('%a'));
            $myDays=explode(",",$horario->dia);
            if($nEvent==0)$temp=$horario->personal;
            for($i=0;$i<=$days;$i++)
            {
                
                if(in_array($datetime1->format("N"),$myDays))
                {
                    $eventos[$nEvent]["dateEvent"]=$datetime1->format("Y-m-d");
                    $eventos[$nEvent]["eventName"]=$horario->inicio."-".$horario->fin.' | '.substr($horario->personal,0,10);
                    if($temp!=$horario->personal)
                    {
                        if($j>3)$j=0;
                        $temp=$horario->personal;
                        $j++;
                    }
                    $eventos[$nEvent]["className"]=$className[$j];
                    $nEvent++;
                }
                $datetime1->modify('+1 day');
            }
        }
        //dd($eventos);
        //$json_events=json_encode($eventos);
        $dias=array("","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
        return view('horarios.index',compact('eventos','horarios','dias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas=Area::all();
        $personal=Personal::all();
        $turnos=Turno::all();
        return view('horarios.create',compact('areas','personal','turnos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HorarioFormRequest $request)
    {
        $horario=new Horario;
        $horario->area_id=$request->input('area');
        $horario->personal_id=$request->input('personal');
        $horario->turno_id=$request->input('turno');
        $horario->fecha=$request->input('inicio');
        $horario->fecha_fin=$request->input('fin');
        $horario->dia=implode(",",$request->input('dias'));
        $horario->guardia_id="";
        $horario->save();
        return redirect()->route('horarios.index')->with('mensaje','Jornada de monitoreo agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show(Horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function edit(Horario $horario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horario $horario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horario $horario)
    {
        $horario->delete();
        return redirect()->route('horarios.index')->with('mensaje','Registro Eliminado');
    }
}
