@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modificar una Marca') }}</div>

                <div class="card-body">
                    <form action="{{route('marcas.update', $marca)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="nombre_marca" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de la Marca') }}</label>

                            <div class="col-md-6">
                                <input id="nombre_marca" type="text" class="form-control @error('nombre_marca') is-invalid @enderror" name="nombre_marca" value="{{$marca->nombre_marca}}" required autocomplete="nombre_marca" autofocus>

                                @error('nombre_marca')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Modificar Marca') }}
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
