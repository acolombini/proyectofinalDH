@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listado de Productos') }}</div>

                <div class="card-body">
                    <form action="{{route('productos.update', $producto)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Titulo') }}</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{$producto->titulo}}" required autocomplete="titulo" autofocus>

                                @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <textarea id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" required autocomplete="descripcion" autofocus>{{$producto->descripcion}}</textarea>
                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categoria_id" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>

                            <div class="col-md-6">
                                <select id="categoria_id" type="date" class="form-control @error('categoria_id') is-invalid @enderror" name="categoria_id" autofocus>

                                    <option value="" disabled>Seleccione una Categoría...</option>

                                    @foreach ($categorias as $categoria)
                                        @if ($producto->categoria_id == $categoria->id)
                                            <option value="{{$categoria->id}}" selected>{{$categoria->getNombreCategoria()}}</option>
                                        @else
                                        <option value="{{$categoria->id}}">{{$categoria->getNombreCategoria()}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('categoria_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="precio_unitario" class="col-md-4 col-form-label text-md-right">{{ __('Precio Unitario') }}</label>

                            <div class="col-md-6">
                                <input id="precio_unitario" type="number" class="form-control @error('precio_unitario') is-invalid @enderror" name="precio_unitario" value="{{$producto->precio_unitario}}" required autocomplete="precio_unitario" autofocus>
                                @error('precio_unitario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descuento" class="col-md-4 col-form-label text-md-right">{{ __('Descuento') }}</label>

                            <div class="col-md-6">
                                <input id="descuento" type="number" class="form-control @error('descuento') is-invalid @enderror" name="descuento" value="{{$producto->descuento}}" autocomplete="descuento" autofocus>
                                @error('descuento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad en stock') }}</label>

                            <div class="col-md-6">
                                <input id="stock" type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{$producto->stock}}" required autocomplete="stock" autofocus>
                                @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @if(isset($producto->poster))
                        <p>Imágen Actual:</p>
                        <img src="/storage/product_poster/{{$producto->poster}}" width="100%" alt="Imágen actual del producto a modificar">
                        @endif
                        <div class="form-group row">
                        <label for="poster" class="col-md-4 col-form-label text-md-right">{{__('Ingrese una foto nueva')}}</label>
                            <div class="col-md-6">
                                <input id="poster" type="file" name="poster" class="form-control @error('poster') is-invalid @enderror" autofocus>
                                @error('poster')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Modificar Producto') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection