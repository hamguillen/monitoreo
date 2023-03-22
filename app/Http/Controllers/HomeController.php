<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Guardia;
use DateTime;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
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
        $dias_guardia=array();
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
                    $guardias=Guardia::select('personal_id','personal.name as personal')
                        ->join('personal','personal.id','personal_id')
                        ->where('jornada_id',$horario->id)
                        ->where('fecha_inicio','<=','2023-03-'.$datetime1->format("d"))
                        ->where('fecha_fin','>=','2023-03-'.$datetime1->format("d"))
                        ->get();
                    
                    if($guardias->count())
                    {
                        foreach($guardias as $guardia)
                        {
                            $eventos[$nEvent]["dateEvent"]="2023-03-".$datetime1->format("d");
                            $eventos[$nEvent]["eventName"]=$horario->inicio."-".$horario->fin.' | Cubre: '.substr($guardia->personal,0,10);
                            $eventos[$nEvent]["className"]="badge bg-danger";
                            $nEvent++;
                        }
                    }
                }
                $datetime1->modify('+1 day');
            }
        }
        //dd($eventos);
        //$json_events=json_encode($eventos);
        $dias=array("","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
        return view('home',compact('eventos','dias','horarios'));
    }
}
