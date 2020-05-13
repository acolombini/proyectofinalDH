@extends('layouts.app')

@section('content')
<main>

@forelse ($productos as $producto)
    {{$producto->titulo}}
@empty

@endforelse


  </main>
@endsection
