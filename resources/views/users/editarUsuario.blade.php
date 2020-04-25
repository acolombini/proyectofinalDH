@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-danger@">
        {{ session('status') }}
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar datos de Usuario') }}</div>

                <div class="card-body">
                    <h1>Hola, {{$usuarioLogueado->getNombreCompleto()}}</h1>

                    <span>Modificá tus datos:</span>
                    <form method="POST" action="/usuario/edit" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        
                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{__('Foto de perfil')}}</label>
                                <div class="col-md-6">
                                    <input id="avatar" type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" autofocus>
                                    @if (isset($usuarioLogueado->avatar))
                                        <span>Imágen actual:</span>
                                        <img src="/storage/users_avatar/{{$usuarioLogueado->avatar}}" style="border-radius: 50%; width: 80px; height: 80px;" alt="Imágen actual">
                                    @endif
                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{$usuarioLogueado->nombre}}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{$usuarioLogueado->apellido}}" required autocomplete="apellido" autofocus>

                                @error('apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$usuarioLogueado->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{$usuarioLogueado->telefono}}" autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo_de_documento" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Documento') }}</label>

                            <div class="col-md-6">
                                <select id="tipo_de_documento" type="date" class="form-control @error('tipo_de_documento') is-invalid @enderror" name="tipo_de_documento" value="{{$usuarioLogueado->tipo_de_documento}}" autofocus>
                                    
                                    @php
                                        $options = [
                                            "DNI" => "DNI",
                                            "libreta_de_enrolamiento" => "Libreta de Enrolamiento",
                                            "libreta_civica" => "Libreta Cívica",
                                            "cedula_de_identidad" => "Cédula de Identidad",
                                            "otro" => "Otro",
                                        ]
                                    @endphp

                                    @if ($usuarioLogueado->tipo_de_documento)
                                        <option value="" disabled>Seleccioná tu tipo de documento...</option>
                                    @else
                                        <option value="" selected disabled>Seleccioná tu tipo de documento...</option>
                                    @endif
                                    
                                    @foreach ($options as $codigo => $option)
                                        @if ($usuarioLogueado->tipo_de_documento == $codigo)
                                            <option value="{{$codigo}}" selected>{{$option}}</option>
                                        @else
                                        <option value="{{$codigo}}">{{$option}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('tipo_de_documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="documento" class="col-md-4 col-form-label text-md-right">{{ __('Número de Documento') }}</label>

                            <div class="col-md-6">
                                <input id="documento" type="number" class="form-control @error('documento') is-invalid @enderror" name="documento" value="{{$usuarioLogueado->documento}}" autofocus>

                                @error('documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_de_nacimiento" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_de_nacimiento" type="date" class="form-control @error('fecha_de_nacimiento') is-invalid @enderror" name="fecha_de_nacimiento" value="{{$usuarioLogueado->fecha_de_nacimiento}}" autofocus>

                                @error('fecha_de_nacimiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="domicilio" class="col-md-4 col-form-label text-md-right">{{ __('Domicilio') }}</label>

                            <div class="col-md-6">
                                <input id="domicilio" type="text" class="form-control @error('domicilio') is-invalid @enderror" name="domicilio" value="{{$usuarioLogueado->domicilio}}" autofocus>

                                @error('domicilio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="provincia" class="col-md-4 col-form-label text-md-right">{{ __('Provincia') }}</label>

                            <div class="col-md-6">
                                <select id="provincia" type="date" class="form-control @error('provincia') is-invalid @enderror" name="provincia" value="{{$usuarioLogueado->provincia}}" autofocus>
                                    

                                @if ($usuarioLogueado->provincia)
                                    <option value="" disabledd>Seleccioná tu provincia...</option>
                                    @php
                                        $provincia_seleccionada = $usuarioLogueado->provincia
                                    @endphp
                                @else
                                    <option value="" selected disabled>Seleccioná tu provincia...</option>
                                @endif
                                </select>
                                @error('provincia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ciudad" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>

                            <div class="col-md-6">
                                <select id="ciudad" type="date" class="form-control @error('ciudad') is-invalid @enderror" name="ciudad" value="{{$usuarioLogueado->ciudad}}" autofocus>
                                    <option value="" disabled selected>Seleccioná tu ciudad...</option>
                                    
                                </select>
                                @error('ciudad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar datos') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>              
        </div>
    </div>
</div>
<script type="text/javascript">
    window.onload = function(){ 
    
    //Traigo la provincia cargada en la base de datos anteriormente para persistirla
    let provinciaSeleccionada = "<?php echo $provincia_seleccionada ?? '' ?>";

    fetch('https://apis.datos.gob.ar/georef/api/provincias')
        .then( function(response){
        return response.json();
        })
        .then( function(data){
        let provincias = data.provincias;

        // Select
        let selectProvincias = document.getElementById("provincia");

        // Options
        for (const key in provincias) {
            let optionProvincia = document.createElement("option");
            let textoDelOptionProvincia = "";

            textoDelOptionProvincia = document.createTextNode(provincias[key].nombre);
            
            optionProvincia.append(textoDelOptionProvincia);
            optionProvincia.setAttribute("value", provincias[key].nombre)

            // Si hay dato en la base de datos, persisto
            if (provinciaSeleccionada === provincias[key].nombre) {
                optionProvincia.setAttribute("selected", "selected");
            }
            optionProvincia.classList.add(provincias[key].id)
            selectProvincias.append(optionProvincia);
        }

        selectProvincias.addEventListener("change", function(){
            let provinciaSeleccionada = selectProvincias.className
            console.log(provinciaSeleccionada)
            mostrarCiudades(selectProvincias.value.className);
        });

        })
        .catch(function(error){
        console.log("Hubo un error. " + error);
        });


    function mostrarCiudades(valorProvincia){
        fetch('https://apis.datos.gob.ar/georef/api/municipios?provincia=' + valorProvincia + "&max=5000")
        //https://apis.datos.gob.ar/georef/api/municipios?provincia=22&max=5000
            .then( function(response){
                return response.json();
            })
            .then( function(data){
                let ciudades = data.ciudades;
                
                // Select
                let selectCiudades = document.getElementById("ciudad");

                // Options
                for (const key in ciudades) {  
                    let optionCiudad = document.createElement("option");
                    let textoDelOptionCiudad = "";

                    textoDelOptionCiudad = document.createTextNode(ciudades[key].nombre);
                    
                    optionCiudad.append(textoDelOptionCiudad);
                    optionCiudad.setAttribute("value", ciudades[key].nombre)
                    selectCiudades.append(optionCiudad);
                }
            })
            .catch(function(error){
                console.log("El error fue " + error);
            });
    }
/*
    selectProvincias.addEventListener("change", function(){
        let valueProvincia = selectProvincias.value;
        fetch('https://apis.datos.gob.ar/georef/api/municipios?provincia=' + valueProvincia + "&max=5000")
        //https://apis.datos.gob.ar/georef/api/municipios?provincia=22&max=5000
            .then( function(response){
                return response.json();
            })
            .then( function(data){
                let ciudades = data.ciudades;
                
                // Select
                let selectCiudades = document.getElementById("ciudad");

                // Options
                for (const key in ciudades) {  
                    let optionCiudad = document.createElement("option");
                    let textoDelOptionCiudad = "";

                    textoDelOptionCiudad = document.createTextNode(ciudades[key].nombre);
                    
                    optionCiudad.append(textoDelOptionCiudad);
                    optionCiudad.setAttribute("value", ciudades[key].nombre)
                    selectCiudads.append(optionCiudad);
                }
            })
            .catch(function(error){
                console.log("El error fue " + error);
        });
    });*/
    }
</script>
@endsection
