@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-md-3 toppad pull-right col-md-offset-3 ">

                </div>
                <div
                    class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
                    <div class="card bg-light mb-3">
                        <div class="card-header text-center text-black"><h4>{{ $peluqueria->nombre }}</h4></div>
                        <div class="card-body">
                            <div class=" col-md-12 col-lg-12 ">
                                <table class="table table-user-information">
                                    <tbody>
                                    <!--                                    <tr>
                                                                            <td><img width='300px' src=''></td>
                                                                            <td></td>
                                                                        </tr>-->
                                    <tr>
                                        <td class="col-md-3 text-black">Contacto:</td>
                                        <td class="col-md-7">{{ $peluqueria->contacto }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 text-black">DNI / CIF:</td>
                                        <td class="col-md-7">{{ $peluqueria->dni }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 text-black">Nº Cuenta:</td>
                                        <td class="col-md-7">{{ $peluqueria->n_cuenta }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 text-black">Direccion:</td>
                                        <td class="col-md-7">{{ $peluqueria->direccion }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 text-black">Telefono:</td>
                                        <td class="col-md-7">{{ $peluqueria->telefono }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2 text-black">Observaciones:</td>
                                        <td class="col-md-7">{{ $peluqueria->observaciones }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2 text-black">Numero Visitas:</td>
                                        <td class="col-md-7">{{ $peluqueria->n_visitas }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2 text-black">Total vendido:</td>
                                        <td class="col-md-7">{{$peluqueria->total_vendido}} €</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2 text-black">Cobrado:</td>
                                        <td class="col-md-7 {{ $peluqueria->total_cobrado < $peluqueria->total_vendido ? 'text-danger' : 'text-success'  }}">{{$peluqueria->total_cobrado}}
                                            €
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-2 text-black">Pendiente:</td>
                                        <td class="col-md-5 {{ $pendiente !== 0 ? 'text-danger' : 'text-success' }}">{{$pendiente}}
                                            €
                                        </td>
                                        <td class="col-md-2"></td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="mypanel mypanel-info">
                            <div class="mypanel-heading consolas">
                                <h3 class='mypanel-title font-weight-bold text-white'></h3>
                            </div>
                            <div class="mypanel-body">
                                <div class="row">

                                </div>
                            </div>
                            <div class="mypanel-footer">
                                <a href="javascript:history.go(-1)" class="btn btn-success
                            rounded" role="button"
                                   aria-pressed="true">&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-arrow-circle-left text-light"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                </a>

                                <a href="{{ route('peluquerias.edit', $peluqueria->id) }}" class="btn btn-danger rounded ml-3" role="button" aria-pressed="" true>
                                    &nbsp;&nbsp;&nbsp; <i class='fas fa-pen-alt text-light'></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

