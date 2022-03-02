@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-left: 10px">
            @foreach($municipios as $municipio)
                <div class="col-md-4 col-sm-4 col-xs-4 mt-2">
                    <a href="{{ route('municipios.show', $municipio->id_municipio) }}"><i class="fas fa-city text-info"></i> {{ $municipio->nombre }}</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
