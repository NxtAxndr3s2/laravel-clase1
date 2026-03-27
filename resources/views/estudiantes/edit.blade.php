{{-- resources/views/estudiantes/edit.blade.php --}}
@extends('layouts.app')
@section('title', 'Editar Estudiante')

@section('content')
    <h2>Editar Estudiante: {{ $estudiante->nombre }}</h2>

    @if($errors->any())
        <div class='alert' style='border-color:#C62828; background:#FFEBEE'>
            @foreach($errors->all() as $error)
                <li class='error'>{{ $error }}</li>
            @endforeach
        </div>
    @endif

    <form action='{{ route('estudiantes.update', $estudiante) }}' method='POST'>
        @csrf
        @method('PUT')
        <label>Nombre: <input type='text' name='nombre'
               value='{{ old('nombre', $estudiante->nombre) }}'></label>
        <label>Apellido: <input type='text' name='apellido'
               value='{{ old('apellido', $estudiante->apellido) }}'></label>
        <label>Email: <input type='email' name='email'
               value='{{ old('email', $estudiante->email) }}'></label>
        <label>Número de Ficha: <input type='text' name='ficha'
               value='{{ old('ficha', $estudiante->ficha) }}'></label>
        <label>Programa: <input type='text' name='programa'
               value='{{ old('programa', $estudiante->programa) }}'></label>
        <label>Teléfono: <input type='text' name='telefono' required
               value='{{ old('telefono', $estudiante->telefono) }}'></label>
        <br>
        <button type='submit' class='btn btn-warning'>Actualizar</button>
        <a href='{{ route('estudiantes.index') }}' class='btn btn-danger'>
            Cancelar</a>
    </form>
@endsection
