@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">Página de Seguimiento</h1>
@endsection


@section('seccion')
    @if(session('msj'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('msj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div>
    @endif

    <form action="{{ route('Seguimiento.xRegistrarSeg') }}" method="post" class="d-grid gap-2">
        @csrf

        @error('idEst')
            <div class="alert alert-danger">
                Ingrese el código 
            </div>
        @enderror

        @error('traAct')
            <div class="alert alert-danger">
                "trabaja actualmente?" 
            </div>
        @enderror

        @error('ofiAct')
            <div class="alert alert-danger">
                ingrese oficio actual
            </div>
        @enderror

        @error('satEst')
            <div class="alert alert-danger">
                ingrese "satisfaccion del egresado"  
            </div>
        @enderror

        @error('fecSeg')
            <div class="alert alert-danger">
                ingrese la fecha de seguimiento 
            </div>
        @enderror

        @error('estSeg')
            <div class="alert alert-danger">
                ingrese estado de matricula 
            </div>
        @enderror
        
        <input type="text" name="idEst" placeholder="Código" value="{{ old('idEst')}}" class="form-control mb-2">
        <select name="traAct" class="form-control mb-2">
            <option value="">trabajo actual</option>
            <option value="SI">SI</option>
            <option value="NO">NO</option>
        </select>
        <select name="ofiAct" class="form-control mb-2">
            <option value="">oficio Actual</option>
            <option value="1cp">1cp</option>
            <option value="2cp">2cp</option>
            <option value="3cp">3cp</option>
            <option value="4cp">4cp</option>
            <option value="5cp">5cp</option>
            <option value="6cp">6cp</option>
            <option value="7cp">7cp</option>

        </select>
        <select name="satEst" class="form-control mb-2">
            <option value="">satisfaccion estudiantil</option>
            <option value="0">no satisfecho</option>
            <option value="1">Regular</option>
            <option value="2">Bueno</option>
            <option value="3">Muy Bueno</option>
        </select>
        <input type="date" name="fecSeg" placeholder="Fecha de seguimiento" value="{{ old('fecSeg')}}" class="form-control mb-2">
        <select name="estSeg" class="form-control mb-2">
            <option value="">estado de matricula</option>
            <option value="0">Inactivo</option>
            <option value="1">Activo</option>
        </select>
        <button class="btn btn-info" type="submit">Agregar</button>
    </form>
    <br>
    <div class="btn btn-green fs-3 fw-bold d-grid">Lista de seguimientos</div>
    <table class="table table-bordered" >
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Código</th>
            <th scope="col">Oficio Actual</th>
            <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        @foreach($xSeguimiento as $item)
        <tr>
            <th scope="row">{{ $item -> id }}</th>
            <td>{{ $item->idEst }}</td>
            <td>
                <a href="{{ route('Seguimiento.xDetalleSeg', $item->id ) }}">
                    {{ $item->ofiAct }}
                </a>
            </td>
        <td>
            <form action="{{ route('Seguimiento.xEliminarSeg', $item->id) }}" method="post" class="d-inline">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">X</button>
            <a class="btn btn-warning btn-sm" href="{{ route('Seguimiento.xActualizarSeg', $item->id) }}">
                A
            </a> 
        </td>
        </tr>
        @endforeach 
    </tbody>
    </table>

    {{ $xSeguimiento->links () }}
   <b>
@endsection


   

