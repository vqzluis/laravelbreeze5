<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class PagesController extends Controller
{
    
    public function fnIndex () {
        return view('welcome');
    }

    public function fnLista () {
        $xAlumnos = Estudiante::all();   //Datos de BD
        return view('pagLista', compact('xAlumnos'));
    }

    public function fnEstDetalle ($id) {
        $xDteAlumnos = Estudiante::findOrFail($id);   //Datos de BD po id
        return view('Etudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function fnGaleria ($numero=null) {
        $valor = $numero;
        $otro = 25;

        return view('pagGaleria', compact('valor', 'otro'));
    }


}