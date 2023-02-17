@extends('layout.template') {{-- Para cargar la plantilla --}}

@section('title', 'Nuevo producto')

@section('contend')

@if ($errors->any())
    {{-- boostrap --}}
    <div class="alert alert-danger">
        <ul>
            @foreach ( $errors->all() as $error )
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ url('/productos') }}" method="POST">
    @csrf
    <div class='mb-3'>
        <label for="codigo" class="form-label" >Código</label>
        <input type="text" name="codigo" id="codigo"
        class="form-control" value="{{ old('codigo') }}" > {{-- required  --}}
    </div>
    @error('codigo')
        {{ $message }}
    @enderror
    <div class='mb-3'>
        <label for="nombre" class="form-label" >Nombre</label>
        <input type="text" name="nombre" id="nombre"
        class="form-control" value="{{ old('nombre') }}"> {{-- required  --}}
    </div>
    <div class='mb-3'>
        <label for="precio" class="form-label" >Precio</label>
        <input type="text" name="precio" id="precio"
         class="form-control" value="{{ old('precio') }}"> {{-- required  --}}
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
