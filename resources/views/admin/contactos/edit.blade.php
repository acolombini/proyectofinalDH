@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modificar una categoría') }}</div>

                <div class="card-body">
                    <form action="{{route('categorias.update', $categoria)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="nombre_categoria" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de la Categoría') }}</label>

                            <div class="col-md-6">
                                <input id="nombre_categoria" type="text" class="form-control @error('nombre_categoria') is-invalid @enderror" name="nombre_categoria" value="{{$categoria->nombre_categoria}}" required autocomplete="nombre_categoria" autofocus>

                                @error('nombre_categoria')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Modificar Categoría') }}
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
