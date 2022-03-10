@extends('layouts.header')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('includes/message')
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white text-center"><h5>{{ isset($producto) ? 'Editar' : 'Nuevo'}} Producto</h5></div>

                        <div class="card-body bg-light">
                            <form method="POST"
                                  action="{{ isset($producto) ? route('productos.update', $producto->id) : route('productos.store') }}">
                                @csrf
                                @if(isset($producto))
                                    @method('PUT')
                                @endif
                                <div class="form-group row">
                                    <label for="municipio"
                                           class="col-md-4 col-form-label text-md-right">Peluqueria</label>

                                    <div class="col-md-6">
                                        <select id="peluqueria"
                                                class="form-control @error('peluqueria') is-invalid @enderror"
                                                name="peluqueria" autofocus>

                                            @foreach($peluquerias as $peluqueria)
                                                <option value="{{$peluqueria->id}}"
                                                        @if(isset($producto) &&
                                                $peluqueria->id === $peluqueria->id) selected @endif>{{$peluqueria->nombre}}</option>
                                            @endforeach
                                        </select>
                                        @error('peluqueria')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="firma"
                                           class="col-md-4 col-form-label text-md-right">Firma</label>

                                    <div class="col-md-6">
                                        <select id="firma"
                                                class="form-control @error('firma') is-invalid @enderror"
                                                name="firma" autofocus>

                                            @foreach($firmas as $firma)
                                                <option value="{{$firma->id}}"
                                                        @if(isset($producto) &&
                                                $firma->id === $producto->id) selected @endif>{{$firma->nombre}}</option>
                                            @endforeach
                                        </select>
                                        @error('firma')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nombre_producto" class="col-md-4 col-form-label text-md-right">Nombre
                                        Producto</label>

                                    <div class="col-md-6">
                                        <input id="nombre_producto" type="text"
                                               class="form-control @error('nombre_producto') is-invalid @enderror"
                                               name="nombre_producto" required autocomplete="nombre_producto"
                                               value="{{ isset($producto->nombre) ? $producto->nombre : ''}}">
                                        @error('nombre_producto')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>

                                    <div class="col-md-6">
                                        <input id="descripcion" type="text"
                                               class="form-control @error('descripcion') is-invalid @enderror"
                                               name="descripcion" autocomplete="descripcion"
                                               value="{{ isset($producto->descripcion) ? $producto->descripcion : ''}}">
                                        @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="precio" class="col-md-4 col-form-label text-md-right">Precio</label>

                                    <div class="col-md-6">
                                        <input id="precio" type="text"
                                               class="form-control @error('precio') is-invalid @enderror"
                                               name="precio" autocomplete="precio"
                                               value="{{ isset($producto->precio) ? $producto->precio : ''}}">
                                        @error('precio')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cantidad" class="col-md-4 col-form-label text-md-right">Cantidad</label>

                                    <div class="col-md-6">
                                        <input id="cantidad" type="number"
                                               class="form-control @error('cantidad') is-invalid @enderror"
                                               name="cantidad" required autocomplete="cantidad"
                                               value="{{ isset($producto->cantidad) ? $producto->cantidad : ''}}">
                                        @error('cantidad')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="descuento" class="col-md-4 col-form-label text-md-right">Descuento</label>

                                    <div class="col-md-6">
                                        <input id="descuento" type="text"
                                               class="form-control @error('descuento') is-invalid @enderror"
                                               name="descuento" autocomplete="telefono"
                                               value="{{ isset($producto->descuento) ? $producto->descuento : ''}}">
                                        @error('descuento')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
<!--                                <div class="form-group row">
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
                                    <label for="total_vendido" class="col-md-4 col-form-label text-md-right">Total Vendido</label>

                                    <div class="col-md-6">
                                        <input id="total_vendido" type="number"
                                               class="form-control @error('total_vendido') is-invalid @enderror" name="total_vendido"
                                               autocomplete="total_vendido"
                                               value="{{ isset($peluqueria->total_vendido) ? $peluqueria->total_vendido : ''}}">
                                        @error('total_vendido')
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
                                </div>-->
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="button" class="btn btn-danger" onclick="javascript:history.go(-1)"
                                        >Atras</button>&nbsp;&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-primary">
                                            {{isset($producto) ? 'Editar Producto' : 'Añadir Producto'}}
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

