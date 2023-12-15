@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4"><b><i>Página de Actualizar Seguimiento</b></i></h1>
@endsection

@section('seccion')

@section('seccion')
    @if(session('msj'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('msj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div>
    @endif

    <form action="{{ route('Seguimiento.xUpdateSeg', $xActSeg->id) }}" method="post" class="d-grid gap-2">
        @method('PUT')
        @csrf

        @if($errors ->has('idEst'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                El campo<strong>Codigo</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif  

        @if($errors ->has('traAct'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                El campo<strong>"trabja actualmente?"</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors ->has('ofiAct'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                El campo<strong>"oficio actual?"</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors ->has('satEst'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                El campo<strong>"satisfaccion del egresado"</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif        

        @if($errors ->has('fecSeg'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                La <strong>fecha de seguimiento</strong> es requerida
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif  

        @if($errors ->has('estSeg'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                El <strong>estado de seguimiento</strong> es requerido
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif  

        
        <input type="text" name="idEst" placeholder="Código" value="{{ $xActSeg->idEst }}" class="form-control mb-2">
        <select name="traAct" class="form-control mb-2">
            <option value="">Seleccione... Trabaja Actualmente?</option>
            <option value="SI" @if ($xActSeg->traAct == "SI") {{ "SELECTED" }} @endif>SI</option>
            <option value="NO" @if ($xActSeg->traAct == "NO") {{ "SELECTED" }} @endif>NO</option>
        </select>
        <select name="ofiAct" class="form-control mb-2">
            <option value="">Seleccione... Oficio Actual?</option>
            <option value="1cp" @if ($xActSeg->ofiAct == "1cp") {{ "SELECTED" }} @endif>1cp</option>
            <option value="2cp" @if ($xActSeg->ofiAct == "2cp") {{ "SELECTED" }} @endif>2cp</option>
            <option value="3cp" @if ($xActSeg->ofiAct == "3cp") {{ "SELECTED" }} @endif>3cp</option>
            <option value="4cp" @if ($xActSeg->ofiAct == "4cp") {{ "SELECTED" }} @endif>4cp</option>
            <option value="5cp" @if ($xActSeg->ofiAct == "5cp") {{ "SELECTED" }} @endif>5cp</option>
            <option value="6cp" @if ($xActSeg->ofiAct == "6cp") {{ "SELECTED" }} @endif>6cp</option>
            <option value="7cp" @if ($xActSeg->ofiAct == "7cp") {{ "SELECTED" }} @endif>7cp</option>
            <option value="8cp" @if ($xActSeg->ofiAct == "8cp") {{ "SELECTED" }} @endif>8cp</option>
            <option value="9cp" @if ($xActSeg->ofiAct == "9cp") {{ "SELECTED" }} @endif>9cp</option>
            <option value="10cp" @if ($xActSeg->ofiAct == "10cp") {{ "SELECTED" }} @endif>10cp</option>
            <option value="11cp" @if ($xActSeg->ofiAct == "11cp") {{ "SELECTED" }} @endif>11cp</option>
        </select>
        <select name="satEst" class="form-control mb-2">
            <option value="">Seleccione satisfación del egresado...</option>
            <option value="0" @if ($xActSeg->satEst == 0) {{ "SELECTED" }} @endif>No esta satisfecho</option>
            <option value="1" @if ($xActSeg->satEst == 1) {{ "SELECTED" }} @endif>Regular</option>
            <option value="2" @if ($xActSeg->satEst == 2) {{ "SELECTED" }} @endif>Bueno</option>
            <option value="3" @if ($xActSeg->satEst == 3) {{ "SELECTED" }} @endif>Muy Bueno</option>
        </select>
        <input type="date" name="fecSeg" placeholder="Fecha de seguimiento" value="{{ $xActSeg->fecSeg }}" class="form-control mb-2">
        <select name="estSeg" class="form-control mb-2">
            <option value="">Seleccione... estado de matricula?</option>
            <option value="0" @if ($xActSeg->estSeg == 0) {{ "SELECTED" }} @endif>Inactivo</option>
            <option value="1" @if ($xActSeg->estSeg == 1) {{ "SELECTED" }} @endif>Activo</option>
        </select>
        <button class="btn btn-warning" type="submit">Actualizar</button>
    </form>
    <br/>

    <div class="btn btn-dark fs-3 fw-bold d-grid">Lista de seguimientos</div>
    <table class="table">
    </table>

@endsection