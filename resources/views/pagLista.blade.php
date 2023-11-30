@extends('pagPlantilla')

@section('titulo')
    <h1>PAGINA DE LISTA... </h1>
@endsection

@section('seccion')
    <h3>...LISTA... </h3>
    @foreach($xAlumnos as $item)
    <p> {{ $item -> id }} - {{ $item -> nomEst }} </p>
    @endforeach
@endsection
