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
                                <select id="provincia" type="date" class="form-control @error('provincia') is-invalid @enderror" name="provincia" autofocus>


                                @if ($usuarioLogueado->provincia)
                                    <option value="" disabled>Seleccioná tu provincia...</option>
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
                                    @if ($usuarioLogueado->ciudad)
                                    <option value="" disabled>Seleccioná tu ciudad...</option>
                                    @php
                                        $ciudad_seleccionada = $usuarioLogueado->ciudad
                                    @endphp
                                @else
                                    <option value="" selected disabled>Seleccioná tu ciudad...</option>
                                @endif
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
    let ciudadSeleccionada = "<?php echo $ciudad_seleccionada ?? '' ?>";
    
    function mostrarCiudades(valorProvincia){
    fetch("https://apis.datos.gob.ar/georef/api/localidades?provincia=" + valorProvincia + "&max=5000")
      .then( function(response){
          return response.json();
      })
      .then( function(data){
        let ciudades = data.localidades;
        
        // Ordeno alfabeticamente las ciudades
        let ciudadesOrdenadas = [];
            for (const key in ciudades) {
                ciudadesOrdenadas.push(ciudades[key].nombre);
                ciudadesOrdenadas.sort();

            }

          // Select
          let selectCiudades = document.getElementById("ciudad");

          // Options
          for (const key in ciudadesOrdenadas) {
              let optionCiudad = document.createElement("option");
              let textoDelOptionCiudad = "";

              textoDelOptionCiudad = document.createTextNode(ciudadesOrdenadas[key]);
              optionCiudad.append(textoDelOptionCiudad);
              optionCiudad.setAttribute("value", ciudadesOrdenadas[key]);
              if (ciudadSeleccionada === ciudadesOrdenadas[key]) {
                    optionCiudad.setAttribute("selected", "selected");
                }
              selectCiudades.append(optionCiudad);
          }
      })
      .catch(function(error){
          console.log("El error fue " + error);
      });
}
function actualizarProvincias(){
  fetch('https://apis.datos.gob.ar/georef/api/provincias')
    .then( function(response){
    return response.json();
    })
    .then( function(data){
    let provincias = data.provincias;

    // Ordeno provincias alfabeticamente
    let provinciasOrdenadas = [];
    for (const key in provincias) {
        provinciasOrdenadas.push(provincias[key].nombre);
        provinciasOrdenadas.sort();
    }

    // Select
    let selectProvincias = document.getElementById("provincia");

    // Options
    for (const key in provinciasOrdenadas) {
        let optionProvincia = document.createElement("option");
        let textoDelOptionProvincia = "";

        textoDelOptionProvincia = document.createTextNode(provinciasOrdenadas[key]);

        optionProvincia.append(textoDelOptionProvincia);
        optionProvincia.setAttribute("value", provinciasOrdenadas[key])

        // Si hay dato en la base de datos, persisto y actualizo las ciudades de esa provincia
        if (provinciaSeleccionada === provinciasOrdenadas[key]) {
            optionProvincia.setAttribute("selected", "selected");

            let provinciaSeleccionada = optionProvincia.value;
            for (const key in provincias) {
                if (provincias[key].nombre == provinciaSeleccionada){
                    let indiceProvinciaSeleccionada = provincias[key].id;
                    let selectCiudades = document.getElementById("ciudad");
                    selectCiudades.innerHTML = '';
                    mostrarCiudades(indiceProvinciaSeleccionada);
                }
                }
        }
        selectProvincias.append(optionProvincia);
    }

      selectProvincias.addEventListener("change", function(){
        let provinciaSeleccionada = selectProvincias.value;//Te da el nombre de la provincia seleccionada

        for (const key in provincias) {
          if (provincias[key].nombre == provinciaSeleccionada){
            let indiceProvinciaSeleccionada = provincias[key].id;
            let selectCiudades = document.getElementById("ciudad");
            selectCiudades.innerHTML = '';
            mostrarCiudades(indiceProvinciaSeleccionada);
          }
        }
      });
    })
    .catch(function(error){
    console.log("Hubo un error. " + error);
    });
}
actualizarProvincias();


    }
</script>


@endsection
