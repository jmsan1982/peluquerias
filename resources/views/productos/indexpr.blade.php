@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($tipoProductos as $tipoProducto)
                <div class="col-md-4 col-sm-4 col-xs-4 mt-2">
                    <a href=""><i class="fas fa-city text-info"></i> {{ $tipoProducto->nombre }}</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
