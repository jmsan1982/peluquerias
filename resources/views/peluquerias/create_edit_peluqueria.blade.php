@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('includes/message')
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-success text-white text-center"><h5>Nueva Peluqueria</h5></div>

                        <div class="card-body bg-light">
                            <form method="POST"
                                  action="{{ isset($peluqueria) ? route('peluquerias.update', $peluqueria->id) : route('peluquerias.store') }}">
                            @csrf
                                @if(isset($peluqueria))
                                    @method('PUT')
                                @endif
                                <div class="form-group row">
                                    <label for="municipio"
                                           class="col-md-4 col-form-label text-md-right">Municipio</label>

                                    <div class="col-md-6">
                                        <select id="municipio"
                                                class="form-control @error('municipio') is-invalid @enderror"
                                                name="municipio" autofocus>

                                            @foreach($municipios as $municipio)
                                                <option value="{{$municipio->id_municipio}}"
                                                        @if(isset($peluqueria) &&
                                                $municipio->id_municipio === $peluqueria->id_municipio) selected @endif>{{$municipio->nombre}}</option>
                                            @endforeach
                                        </select>
                                        @error('municipio')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nombre_peluqueria" class="col-md-4 col-form-label text-md-right">Nombre
                                        Peluqueria</label>

                                    <div class="col-md-6">
                                        <input id="nombre_peluqueria" type="text"
                                               class="form-control @error('nombre_peluqueria') is-invalid @enderror"
                                               name="nombre_peluqueria" required autocomplete="nombre_peluqueria"
                                               value="{{ isset($peluqueria->nombre) ? $peluqueria->nombre : ''}}">
                                        @error('nombre_peluqueria')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nombre_contacto" class="col-md-4 col-form-label text-md-right">Nombre
                                        Contacto</label>

                                    <div class="col-md-6">
                                        <input id="nombre_contacto" type="text"
                                               class="form-control @error('nombre_contacto') is-invalid @enderror"
                                               name="nombre_contacto" autocomplete="nombre_contacto"
                                               value="{{ isset($peluqueria->contacto) ? $peluqueria->contacto : ''}}">
                                        @error('nombre_contacto')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dni" class="col-md-4 col-form-label text-md-right">DNI / CIF</label>

                                    <div class="col-md-6">
                                        <input id="dni" type="text"
                                               class="form-control @error('dni') is-invalid @enderror"
                                               name="dni" autocomplete="dni"
                                               value="{{ isset($peluqueria->dni) ? $peluqueria->dni : ''}}">
                                        @error('dni')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="numero_cuenta" class="col-md-4 col-form-label text-md-right">Numero de cuenta</label>

                                    <div class="col-md-6">
                                        <input id="numero_cuenta" type="text"
                                               class="form-control @error('numero_cuenta') is-invalid @enderror"
                                               name="numero_cuenta" autocomplete="numero_cuenta"
                                               value="{{ isset($peluqueria->n_cuenta) ? $peluqueria->n_cuenta : ''}}">
                                        @error('numero_cuenta')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="direccion" class="col-md-4 col-form-label text-md-right">Dirección</label>

                                    <div class="col-md-6">
                                        <input id="direccion" type="text"
                                               class="form-control @error('direccion') is-invalid @enderror"
                                               name="direccion" autocomplete="direccion"
                                               value="{{ isset($peluqueria->direccion) ? $peluqueria->direccion : ''}}">
                                        @error('direccion')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="correo" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                                    <div class="col-md-6">
                                        <input id="correo" type="email"
                                               class="form-control @error('correo') is-invalid @enderror"
                                               name="correo" autocomplete="telefono"
                                               value="{{ isset($peluqueria->correo) ? $peluqueria->correo : ''}}">
                                        @error('correo')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono</label>

                                    <div class="col-md-6">
                                        <input id="telefono" type="text"
                                               class="form-control @error('telefono') is-invalid @enderror"
                                               name="telefono" required autocomplete="telefono"
                                               value="{{ isset($peluqueria->telefono) ? $peluqueria->telefono : ''}}">
                                        @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="observaciones" class="col-md-4 col-form-label text-md-right">Observaciones</label>

                                    <div class="col-md-6">
                                        <textarea id="observaciones" class="form-control @error('observaciones') is-invalid @enderror" rows="3"
                                        name="observaciones">
                                            {{ isset($peluqueria->observaciones) ? $peluqueria->observaciones : ''}}
                                        </textarea>
                                        @error('observaciones')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="numero_visitas" class="col-md-4 col-form-label text-md-right">Visitas</label>

                                    <div class="col-md-6">
                                        <input id="numero_visitas" type="number"
                                               class="form-control @error('numero_visitas') is-invalid @enderror" name="numero_visitas"
                                               required autocomplete="numero_visitas"
                                               value="{{ isset($peluqueria->n_visitas) ? $peluqueria->n_visitas : ''}}">

                                        @error('numero_visitas')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="total_cobrado" class="col-md-4 col-form-label text-md-right">Total Cobrado</label>

                                    <div class="col-md-6">
                                        <input id="total_cobrado" type="number"
                                               class="form-control @error('total_cobrado') is-invalid @enderror" name="total_cobrado"
                                               autocomplete="total_cobrado"
                                               value="{{ isset($peluqueria->total_cobrado) ? $peluqueria->total_cobrado : ''}}">
                                        @error('total_cobrado')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="button" class="btn btn-danger" onclick="javascript:history.go(-1)"
                                                >Atras</button>&nbsp;&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-success">
                                            {{isset($peluqueria) ? 'Editar Peluqueria' : 'Añadir Peluqueria'}}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
