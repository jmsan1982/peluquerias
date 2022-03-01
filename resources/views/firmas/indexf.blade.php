@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($firmas as $firma)
                <div class="col-md-3 col-sm-3 col-xs-3 mt-3">
                    <a href="{{ route('firmas.show', $firma->id) }}"><button class="firmasListButton">{{$firma->nombre}}</button></a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
