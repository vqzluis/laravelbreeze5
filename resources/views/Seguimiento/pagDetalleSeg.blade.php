@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Página de Detalle Seguimiento</h1>
@endsection

@section('seccion')
   <h3> Detalle seguimiento </h3>

   <p> Id:                 {{ $xDetSeg->id }} </p>
   <p> Id Estudiante:              {{ $xDetSeg->idEst }} </p>
   <p> Trabja:               {{ $xDetSeg->traAct }} </p>
   <p> Oficio: {{ $xDetSeg->ofiAct }} </p>
   <p> satisfaccion del Estudiante:               {{ $xDetSeg->satEst }} </p>
   <p> Fecha del Seguimiento:            {{ $xDetSeg->fecSeg }} </p>
   <p> Estado de seguimiento: {{ $xDetSeg->estSeg }} </p>
    
@endsection
   

