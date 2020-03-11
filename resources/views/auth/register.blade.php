@extends('layouts.app')

@section('title', 'Registro')

<!-- Bootstrap datepicker css -->
@section('css')
<link href="{{ asset('css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container my-2 mx-auto py-2 ">
    <section class="ml-3 mr-3">
        <div class="container bg-transparent">
            <form id="reg_form" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- OBLIGATORIO -->
                <div class="shadow m-1 mb-3 p-4 bg-transparent-dark">
                    <h2 class="text-center mb-5">Obligatorio</h2>
                    <div class="bg-transparent container">
                        <div class="bg-transparent d-flex flex-column">

                            <!-- Primer row -->
                            <div class="w-100 d-flex flex-wrap flex-md-nowrap mb-2">

                                <!-- Input de Nombre -->
                                <div class="w-100 mr-md-3 form-group mb-4 mb-md-3">
                                    <label for="nombre_id" class="mb-2">Nombre</label>

                                    <input name="nombre" type="text" id="nombre_id" class="py-1 px-3 form-control shadow @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" {{--required--}} placeholder="Nombre..." autocomplete="given-name" autofocus>

                                    @error('nombre')
                                    <span class="invalid-feedback position-absolute" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Input de Apellido -->
                                <div class="w-100 ml-md-3 form-group mb-4 mb-md-3">
                                    <label for="apellido_id" class="mb-2">Apellido</label>

                                    <input name="apellido" type="text" id="apellido_id" class="py-1 px-3 form-control shadow @error('apellido') is-invalid @enderror" value="{{ old('apellido') }}" {{--required--}} placeholder="Apellido..." autocomplete="family-name">

                                    @error('apellido')
                                    <span class="invalid-feedback position-absolute" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <!--// Fin Primer Fila //-->

                            <!-- Segundo row -->
                            <div class="w-100 d-flex flex-wrap flex-md-nowrap mb-2">

                                <!-- Input de Email -->
                                <div class="w-100 mr-md-3 form-group mb-4 mb-md-3">
                                    <label for="email_id" class="mb-2">E-mail</label>

                                    <input name="email" type="text" id="email_id" class="py-1 px-3 form-control shadow @error('email') is-invalid @enderror" value="{{ old('email') }}" {{--required--}} placeholder="email@example.com" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback position-absolute" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Input de Fecha de Nacimiento -->
                                <div class="w-100 ml-md-3 form-group mb-4 mb-md-3">
                                    <label for="fecha_de_nacimiento_id" class="mb-2">Fecha de nacimiento</label>

                                    <input name="fecha_de_nacimiento" type="text" id="fecha_de_nacimiento_id" class="date py-1 px-3 form-control shadow @error('fecha_de_nacimiento') is-invalid @enderror" value="{{ old('fecha_de_nacimiento') }}" {{--required--}} placeholder="dd-mm-aaaa">

                                    @error('fecha_de_nacimiento')
                                    <span class="invalid-feedback position-absolute" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <!--// Fin Segunda Fila //-->

                            <!-- Tercer row -->
                            <div class="w-100 d-flex flex-wrap flex-md-nowrap mb-2">

                                <!-- Input de Contraseña -->
                                <div class="w-100 mr-md-3 form-group mb-4 mb-md-3">
                                    <label for="password_id" class="mb-2">Contraseña</label>

                                    <input name="password" type="password" id="password_id" class="w-100 py-1 px-3 form-control shadow @error('password') is-invalid @enderror" {{--required--}} placeholder="Contraseña...">

                                    @error('password')
                                    <span class="invalid-feedback position-absolute" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Input de Confirmar Contraseña -->
                                <div class="w-100 ml-md-3 form-group mb-4 mb-md-3">
                                    <label for="password_confirmation_id" class="mb-2 d-flex flex-nowrap">Confirmar contraseña</label>

                                    <input name="password_confirmation" type="password" id="password_confirmation_id" class="w-100 py-1 px-3 form-control shadow" {{--required--}} placeholder="Confirmar contraseña...">
                                </div>

                            </div>
                            <!--// Fin Tercer Fila //-->

                        </div>
                    </div>
                </div>
                <!--// Fin OBLIGATORIO //-->


                <!-- OPCIONAL -->
                <div class="shadow m-1 p-4 bg-transparent-dark">
                    <div class="d-flex flex-column text-center">
                        <h2>Opcional</h2>
                        <h5>Contacto</h5>
                    </div>

                    <!-- Primera Fila -->
                    <div class="container bg-transparent border-bottom border-dark mb-3 pb-3">
                        <div class="w-50 d-flex flex-wrap flex-md-nowrap mb-2">

                            <!-- Input de Numero de Teléfono -->
                            <div class="w-100 mr-md-3 form-group mb-4 mb-md-3">
                                <label for="numero_de_telefono_id" class="mb-2 mr-md-3">Teléfono</label>

                                <input name="numero_de_telefono" type="number" id="numero_de_telefono_id" class="py-1 px-3 form-control shadow @error('numero_de_telefono') is-invalid @enderror" value="{{ old('numero_de_telefono') }}" {{--required--}} placeholder="Número..." autocomplete="tel">

                                @error('numero_de_telefono')
                                <span class="invalid-feedback position-absolute" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <!--// Fin Primera Fila //-->

                    <!-- Segunda Fila -->
                    <div class="container bg-transparent border-bottom border-dark mb-3 pb-3">
                        <h5 class="text-center mx-auto mb-3">Documentación</h5>
                        <div class="bg-transparent d-flex flex-column">

                            <!-- Input de Número de Documento -->
                            <div class="w-100 d-flex flex-wrap flex-md-nowrap mb-2">

                                <div class="w-100 mr-md-3 form-group mb-4 mb-md-3">
                                    <label for="numero_de_documento_id" class="mb-2">Documento</label>

                                    <input name="numero_de_documento" type="number" id="numero_de_documento_id" class="py-1 px-3 form-control shadow @error('numero_de_documento') is-invalid @enderror" value="{{ old('numero_de_documento') }}" placeholder="Número...">

                                    @error('numero_de_documento')
                                    <span class="invalid-feedback position-absolute" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Input de Tipo de Documento -->
                                <div class="w-100 ml-md-3 form-group mb-4 mb-md-3">
                                    <label for="tipo_de_documento_id" class="mb-2">Tipo de documento</label>

                                    <select name="tipo_de_documento" id="tipo_de_documento_id" class="py-1 px-3 form-control shadow @error('tipo_de_documento') is-invalid @enderror" value="{{ old('tipo_de_documento') }}">
                                        <!-- Dropdown de documentos -->
                                    </select>

                                    @error('tipo_de_documento')
                                    <span class="invalid-feedback position-absolute" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--// Fin Segunda Fila //-->

                    <!-- Tercer Fila -->
                    <div class="container bg-transparent">
                        <h5 class="text-center mx-auto mb-3">Dirección</h5>

                        <div class="bg-transparent d-flex flex-column">
                            <div class="w-100 d-flex flex-wrap flex-md-nowrap mb-2">

                                <!-- Input Provincia -->
                                <div class="w-100 d-flex flex-wrap flex-md-nowrap">
                                    <div class="w-100 mr-md-3 form-group mb-4 mb-md-3">
                                        <label for="provincia_id" class="mb-2">Provincia</label>

                                        <input name="provincia" type="text" id="provincia_id" class="w-100 py-1 px-3 form-control shadow @error('provincia') is-invalid @enderror" value="{{ old('provincia') }}" placeholder="Provincia...">

                                        @error('provincia')
                                        <span class="invalid-feedback position-absolute" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Input de Ciudad -->
                                    <div class="w-100 ml-md-3 form-group mb-4 mb-md-3">
                                        <label class="mb-2" for="ciudad">Ciudad</label>

                                        <input name="ciudad" type="text" id="ciudad" class="py-1 px-3 form-control shadow @error('ciudad') is-invalid @enderror" value="{{ old('Ciudad') }}" placeholder="Ciudad...">

                                        @error('ciudad')
                                        <span class="invalid-feedback position-absolute" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="w-100 d-flex flex-wrap flex-md-nowrap form-group mb-2">
                                <div class="w-100 mr-md-3 d-md-flex">

                                    <!-- Input de Calle -->
                                    <div class="w-100 mr-md-2 form-group mb-4 mb-md-3">
                                        <label for="calle_id" class="mb-2">Calle</label>

                                        <input name="calle" type="text" id="calle_id" class="w-100 py-1 px-3 form-control shadow @error('calle') is-invalid @enderror" value="{{ old('Ciudad') }}" value="{{ old('calle') }}" placeholder="Calle...">

                                        @error('calle')
                                        <span class="invalid-feedback position-absolute" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Input de Altura -->
                                    <div class="w-100 ml-md-2 form-group mb-4 mb-md-3">
                                        <label for="altura_id" class="mb-2">Altura</label>

                                        <input name="altura" type="text" id="altura_id" class="w-100 py-1 px-3 form-control shadow @error('altura') is-invalid @enderror" value="{{ old('altura') }}" placeholder="Altura..">

                                        @error('altura')
                                        <span class="invalid-feedback position-absolute" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                                <!-- Input de Piso -->
                                <div class="w-100 ml-md-3 d-md-flex">

                                    <div class="w-100 mr-md-2 form-group mb-4 mb-md-3">
                                        <label for="piso_id" class="mb-2">Piso</label>

                                        <input name="piso" type="text" id="piso_id" class="py-1 px-3 form-control shadow @error('piso') is-invalid @enderror" value="{{ old('piso') }}" placeholder="Piso...">

                                        @error('piso')
                                        <span class="invalid-feedback position-absolute" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Input de Departamento -->
                                    <div class="w-100 ml-md-2 form-group">
                                        <label for="departamento_id" class="mb-2">Departamento</label>

                                        <input name="departamento" type="text" id="departamento_id" class="w-100 py-1 px-3 form-control shadow @error('departamento') is-invalid @enderror" value="{{ old('departamento') }}" placeholder="Depto...">

                                        @error('departamento')
                                        <span class="invalid-feedback position-absolute" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--// Fin Tercer Fila //-->

                    <div class="d-flex flex-column mt-3 w-100">

                        <!-- Botón de Registro -->
                        <div class="w-100 d-flex">
                            <button type="submit" class="btn-primary p-2 border-0 w-50 mx-auto">Registrarse</button>
                        </div>

                        <!-- Checkbox de Recordarme -->
                        <div class="custom-control custom-checkbox mt-2 ml-2">
                            <input name="recordar" type="checkbox" id="recordar" class="custom-control-input" value="yes">

                            <label for="recordar" class="custom-control-label">Recuérdame</label>
                        </div>

                        <!-- Checkbox de ToS -->
                        <div class="custom-control custom-checkbox ml-2 form-group mb-4 mb-md-3">
                            <input name="tos" type="checkbox" id="tos_id" class="custom-control-input form-control @error('tos') is-invalid @enderror" value="yes" {{--required--}}>

                            <label for="tos_id" class="custom-control-label tos mt-2 @error('tos') text-danger @enderror">Acepto los Términos y Condiciones del sitio.</label>
                        </div>
                    </div>
                </div>
                <!--// Fin OPCIONAL //-->
            </form>

        </div>

</div>
@endsection

<!-- Bootstrap datepicker js -->
@section('scripts')
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/locales/bootstrap-datepicker.es.min.js') }}"></script>
<script type="text/javascript">
    $('.date').datepicker({
            language: 'es',
            format: 'dd-mm-yyyy',
            weekStart: 0,
            todayHighlight: true,
            autoclose: true,
            assumeNearbyYear: true,
            endDate: '0d',
            forceParse: true,
            startDate: '01-01-1900'
        });
</script>
@endsection
