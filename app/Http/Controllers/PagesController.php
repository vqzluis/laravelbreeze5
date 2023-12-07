<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class PagesController extends Controller
{
    public function fnRegistrar (Request $request) {
        //return $request //verificando "token" y datos recibidos

        $request -> validate([
            'codEst' => 'required',
            'nomEst' => 'required',
            'apeEst' => 'required',
            'fnaEst' => 'required',
            'turMat' => 'required',
            'semMat' => 'required',
            'estMat' => 'required'
            
        ]);

        $nuevoEstudiante = new Estudiante;

        $nuevoEstudiante->codEst = $request->codEst;
        $nuevoEstudiante->nomEst = $request->nomEst;
        $nuevoEstudiante->apeEst = $request->apeEst;
        $nuevoEstudiante->fnaEst = $request->fnaEst;
        $nuevoEstudiante->turMat = $request->turMat;
        $nuevoEstudiante->semMat = $request->semMat;
        $nuevoEstudiante->estMat = $request->estMat;

        $nuevoEstudiante->save(); //guardar en bd

        //$Alumnos = Estudiante::all();
        //return view('pagLista', compact('xAlumnos')); //carga pagina
        return back()->with('msj', 'Se registro con exito...');
    }



    public function fnIndex () {
        return view('welcome');
    }

    public function fnEstDetalle($id){
        $xDetAlumnos = Estudiante::findOrFail($id);   //Datos de BD po id
        return view('Estudiante.pagDetalle', compact('xDetAlumnos')); //compac pasa la variable
    }

    public function fnLista(){
        $xAlumnos = Estudiante::all();   //Datos de BD
        return view('pagLista', compact('xAlumnos'));
    }

    public function fnGaleria ($numero=null) {
        $valor = $numero;
        $otro = 25;

        return view('pagGaleria', compact('valor', 'otro'));
    }


}