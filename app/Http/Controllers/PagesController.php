<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Seguimiento;

class PagesController extends Controller
{
    public function fnIndex () {
        return view('welcome');
    }

    public function fnEstDetalle($id){
        $xDetAlumnos = Estudiante::findOrFail($id);     //Datos de BD por id
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function fnEstActualizar($id){
        $xActAlumnos = Estudiante::findOrFail($id);
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    public function fnUpdate(Request $request, $id){
        
        $xUpdateAlumnos = Estudiante::findOrFail($id);

        $xUpdateAlumnos -> codEst = $request -> codEst;
        $xUpdateAlumnos -> nomEst = $request -> nomEst;
        $xUpdateAlumnos -> apeEst = $request -> apeEst;
        $xUpdateAlumnos -> fnaEst = $request -> fnaEst;
        $xUpdateAlumnos -> turMat = $request -> turMat;
        $xUpdateAlumnos -> semMat = $request -> semMat;
        $xUpdateAlumnos -> estMat = $request -> estMat;

        $xUpdateAlumnos -> save();

        //$xAlumnos = Estudiante::all();                    Datos BD
        //return view('pagLista', compact('xAlumnos));        Equivalente

        return back()->with('msj','Se actualizó con éxito...');
    }

    public function fnEliminar($id){
        $deleteAlumno = Estudiante::findOrFail($id);
        $deleteAlumno->delete();
        return back()->with('msj', 'Se elimino con éxito...');
    }
    
    
    public function fnLista () {
        $xAlumnos = Estudiante::all();   //Datos de BD
        return view('pagLista', compact('xAlumnos'));
    }

    
    public function fnGaleria ($numero=null) {
        $valor = $numero;
        $otro = 25;

        //return view('pagGaleria', ['valor'=>$, 'otro' =>25]);
        return view('pagGaleria', compact('valor', 'otro'));
    }

    public function fnRegistrar(Request $request){

        //return $request->all();         //Prueba de "token" y datos recibidos

        $request ->validate([
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
        
        $nuevoEstudiante->save();
        
        //$xAlumnos = Estudiante1::all();                      //Datos de BD
        //return view('pagLista', compact('xAlumnos'));        //Pasar a pagLista
        return back()->with('msj','Se registro con éxito...'); //Regresar con msj
    }

    //================================

    public function fnListaSeguimiento () {
        $xSeguimiento = Seguimiento::paginate (4);   //Datos de BD
        return view('pagListaSeguimientos', compact('xSeguimiento'));
    }

    public function fnSegDetalle($id){
        $xDetSeg = Seguimiento::findOrFail($id);     //Datos de BD por id
        return view('Seguimiento.pagDetalleSeg', compact('xDetSeg'));
    }

    public function fnEliminarSeg($id){
        $deleteSeg = Seguimiento::findOrFail($id);
        $deleteSeg->delete();
        return back()->with('msj', 'Se elimino con éxito...');
    }

    public function fnRegistrarSeg(Request $requestseg){

        //return $request->all();         //Prueba de "token" y datos recibidos

        $requestseg ->validate([
            'idEst' => 'required',
            'traAct' => 'required',
            'ofiAct' => 'required',
            'satEst' => 'required',
            'fecSeg' => 'required',
            'estSeg' => 'required'
        ]);

        $nuevoSeguimiento = new Seguimiento;
        $nuevoSeguimiento->idEst = $requestseg->idEst;
        $nuevoSeguimiento->traAct = $requestseg->traAct;
        $nuevoSeguimiento->ofiAct = $requestseg->ofiAct;
        $nuevoSeguimiento->satEst = $requestseg->satEst;
        $nuevoSeguimiento->fecSeg = $requestseg->fecSeg;
        $nuevoSeguimiento->estSeg = $requestseg->estSeg;
        
        $nuevoSeguimiento->save();
        
        return back()->with('msj','Se registro con éxito...'); //Regresar con msj
    }

    public function fnSegActualizar($id){
        $xActSeg = Seguimiento::findOrFail($id);
        return view('Seguimiento.pagActualizarSeg', compact('xActSeg'));
    }

    public function fnUpdateSeg(Request $request, $id){
        
        $xUpdateSeg = Seguimiento::findOrFail($id);

        $xUpdateSeg -> idEst = $request -> idEst;
        $xUpdateSeg -> traAct = $request -> traAct;
        $xUpdateSeg -> ofiAct = $request -> ofiAct;
        $xUpdateSeg -> satEst = $request -> satEst;
        $xUpdateSeg -> fecSeg = $request -> fecSeg;
        $xUpdateSeg -> estSeg = $request -> estSeg;

        $xUpdateSeg -> save();

        return back()->with('msj','Se actualizó con éxito...');
    }

   
    
}


