@extends('layouts.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-6 mt-2">
        <a href="{{ route('municipios.index') }}"><button class="municipioButton">Municipios</button></a>
        </div>
        <div class="col-md-4 col-sm-6 ml-5 mt-2">
            <a href="{{ route('peluquerias.index') }}"><button class="peluqueriasButton">Peluquerias</button></a>
        </div>
    </div>
</div>
@endsection
