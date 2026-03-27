{{-- resources/views/estudiantes/create.blade.php --}}
@extends('layouts.app')
@section('title', 'Registrar Estudiante')

@section('content')
    <h2>Registrar Nuevo Estudiante</h2>

    @if($errors->any())
        <div class='alert' style='border-color:#C62828; background:#FFEBEE'>
            <strong>Por favor corrige los siguientes errores:</strong>
            <ul>
            @foreach($errors->all() as $error)
                <li class='error'>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action='{{ route('estudiantes.store') }}' method='POST'>
        @csrf
        <label>Nombre: <input type='text' name='nombre'
               value='{{ old('nombre') }}' placeholder='Ej: Juan'></label>
        <label>Apellido: <input type='text' name='apellido'
               value='{{ old('apellido') }}' placeholder='Ej: Pérez'></label>
        <label>Email: <input type='email' name='email'
               value='{{ old('email') }}' placeholder='juan@email.com'></label>
        <label>Número de Ficha: <input type='text' name='ficha'
               value='{{ old('ficha') }}' placeholder='Ej: 2883614'></label>
        <label>Programa: <input type='text' name='programa'
               value='{{ old('programa') }}'
               placeholder='Análisis y Desarrollo de Software'></label>
        <label>Teléfono: <input type='text' name='telefono' required
               value='{{ old('telefono') }}' placeholder='Ej: 3205551234'></label>
        <br>
        <button type='submit' class='btn btn-primary'>Guardar</button>
        <a href='{{ route('estudiantes.index') }}' class='btn btn-danger'>
            Cancelar</a>
    </form>
@endsection
