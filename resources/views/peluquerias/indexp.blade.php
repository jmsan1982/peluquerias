@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-left: 10px">
            <div class="row">
                <div class="col-sm-6 col-lg-3 text-center">
                    <a class="nav-link text-light text-center" href="{{ route('peluquerias.create') }}">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <i class="fas fa-cut text-light"></i>
                                <i class="fas fa-plus"></i> Añadir Peluqueria
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @include('includes/message')
            <div id="actualizar_peluqueria" class="alert alert-danger d-none">
                Error al al actualizar la ultima fecha de visita de la peluqueria
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-12 col-lg-12 text-center">
                    <table class="table table-bordered table-sm mb-0 text-center " id="tabla_peluquerias">
                        <thead>
                        <tr class="text-info">
                            <th scope="col" class="text-center"><b>Modificar/Eliminar</b></th>
                            <th scope="col" class="text-center"><b>Nombre</b></th>
                            @if(!isset($all))
                                <th scope="col" class="text-center"><b>Dirección</b></th>
                            @endif
                            <th scope="col" class="text-center"><b>Telefono</b></th>
                            @if(isset($all) && $all)
                                <th scope="col" class="text-center"><b>Población</b></th>
                            @endif
                            <th scope="col" class="text-center"><b>Ultima Visita</b></th>
                            <th scope="col" class="text-center"><b>Actualizar Visita / Visivilidad</b></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($peluquerias as $peluqueria)
                            <tr>
                                <td>
                                    <a href="{{ route('peluquerias.edit', $peluqueria->id) }}"
                                       class="btn btn-primary btn-sm">
                                        <i class='fas fa-edit fa-lg'></i>
                                    </a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#modal_aliminar_peluqueria_{{$peluqueria->id}}">
                                        <i class='fas fa-trash-alt fa-lg'></i>
                                    </button>
                                    @include('peluquerias/modal_eliminar')
                                </td>

                                <td>
                                    <a style="{{$peluqueria->interesa != 0 ? 'color:green' : 'color:red' }}" href="{{ route('peluquerias.show', $peluqueria->id) }}">{{$peluqueria->nombre}}</a>
                                </td>
                                @if(!isset($all))
                                <td>{{$peluqueria->direccion}}</td>
                                @endif
                                <td>{{$peluqueria->telefono}}</td>
                                @if(isset($all) && $all)
                                    <td>{{$peluqueria->municipio->nombre}}</td>
                                @endif
                                <td>{{is_null($peluqueria->ultima_visita) ? '' : \Carbon\Carbon::parse($peluqueria->ultima_visita)->format('d-m-Y')}}</td>
                                <td>
                                    <i class="iVisitaPlus fas fa-calendar-plus fa-2x" style="margin-right: 10px;" onclick="actualizarFecha({{$peluqueria->id}})"></i>
                                    <i class="visivilidad fas fa-paint-brush fa-2x" onclick="actualizarInteresa({{$peluqueria->id}})"></i>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br/><br/>
            <div class="row">
                <div class="col-sm-6 col-lg-3 text-center mt-4">
                    <div class="card text-white bg-success text-center">
                        <div class="card-body pb-0">
                            <a class="nav-link text-light text-center" href="javascript:history.go(-1)"><i
                                    class="fas fa-arrow-circle-left fa-2x text-light">
                                </i> </a>
                            <p class="text-light text-center">Volver Atras</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/dataTable.js') }}" defer></script>
@endsection

