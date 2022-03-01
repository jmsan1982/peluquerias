@extends('layouts.header')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-sm-6 col-lg-3 text-center">
                    <a class="nav-link text-light text-center" href="{{ route('productos.create') }}">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <div class="card-body">
                                <i class="fas fa-box-full"></i>
                                <i class="fas fa-plus"></i> Añadir Producto
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @include('includes/message')
            <div class="row">
                <div class="col-xs-6 col-sm-12 col-lg-12 text-center">
                    <table class="table table-bordered table-sm mb-0 text-center " id="tabla_productos">
                        <thead>
                        <tr class="text-info">
                            <th scope="col" class="text-center"><b>Modificar/Eliminar</b></th>
                            <th scope="col" class="text-center"><b>Firma</b></th>
                            <th scope="col" class="text-center"><b>Nombre</b></th>
                            <th scope="col" class="text-center"><b>Peluqueria</b></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productos as $producto)
                            <tr>
                                <td>
                                    <a href="{{ route('productos.edit', $producto->id) }}"
                                       class="btn btn-primary btn-sm">
                                        <i class='fas fa-edit fa-lg'></i>
                                    </a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#modal_aliminar_peluqueria">
                                        <i class='fas fa-trash-alt fa-lg'></i>
                                    </button>
                                    {{--@include('peluquerias/modal_eliminar')--}}
                                </td>

                                <td>
                                    {{ $producto->firma->nombre }}
                                </td>
                                <td>
                                    <a href="{{ route('productos.show', $producto->id) }}">{{ $producto->nombre }}</a>
                                </td>
                                <td>{{ $producto->peluqueria->nombre }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br/><br/>
            <div class="row">
                <div class="col-sm-6 col-lg-3 text-center mt-4">
                    <div class="card text-white bg-primary text-center">
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


