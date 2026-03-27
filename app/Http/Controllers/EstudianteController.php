<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    // READ — Listar todos los estudiantes
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    // CREATE — Mostrar formulario de creación
    public function create()
    {
        return view('estudiantes.create');
    }

    // CREATE — Guardar el nuevo estudiante en la BD
    public function store(Request $request)
    {
        $request->validate([
            'nombre'   => ['required','min:2','max:100','regex:/^[\\pL\\s]+$/u'],
            'apellido' => ['required','min:2','max:100','regex:/^[\\pL\\s]+$/u'],
            'email'    => 'required|email|unique:estudiantes',
            'ficha'    => ['required','digits_between:4,10'],
            'programa' => 'required|min:3|max:150',
            'telefono' => ['required','regex:/^[0-9+\\s()\\-]{6,20}$/'],
        ], [
            'nombre.required'   => 'El nombre es obligatorio.',
            'nombre.min'        => 'El nombre debe tener al menos 2 caracteres.',
            'nombre.max'        => 'El nombre no puede superar 100 caracteres.',
            'nombre.regex'      => 'El nombre solo debe contener letras y espacios.',
            'apellido.required' => 'El apellido es obligatorio.',
            'apellido.min'      => 'El apellido debe tener al menos 2 caracteres.',
            'apellido.max'      => 'El apellido no puede superar 100 caracteres.',
            'apellido.regex'    => 'El apellido solo debe contener letras y espacios.',
            'email.required'    => 'El email es obligatorio.',
            'email.email'       => 'Ingresa un email válido.',
            'email.unique'      => 'Este email ya está registrado.',
            'ficha.required'    => 'El número de ficha es obligatorio.',
            'ficha.digits_between' => 'La ficha debe tener entre 4 y 10 dígitos.',
            'programa.required' => 'El programa es obligatorio.',
            'programa.min'      => 'El programa debe tener al menos 3 caracteres.',
            'programa.max'      => 'El programa no puede superar 150 caracteres.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.regex'    => 'El teléfono debe tener entre 6 y 20 caracteres numéricos (puede incluir +, espacios o guiones).',
        ]);

        Estudiante::create($request->all());

        return redirect()->route('estudiantes.index')
                         ->with('success', 'Estudiante registrado correctamente.');
    }

    // UPDATE — Mostrar formulario de edición
    public function edit(Estudiante $estudiante)
    {
        return view('estudiantes.edit', compact('estudiante'));
    }

    // UPDATE — Guardar los cambios en la BD
    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'nombre'   => ['required','min:2','max:100','regex:/^[\\pL\\s]+$/u'],
            'apellido' => ['required','min:2','max:100','regex:/^[\\pL\\s]+$/u'],
            'email'    => 'required|email|unique:estudiantes,email,' . $estudiante->id,
            'ficha'    => ['required','digits_between:4,10'],
            'programa' => 'required|min:3|max:150',
            'telefono' => ['required','regex:/^[0-9+\\s()\\-]{6,20}$/'],
        ], [
            'nombre.required'   => 'El nombre es obligatorio.',
            'nombre.min'        => 'El nombre debe tener al menos 2 caracteres.',
            'nombre.max'        => 'El nombre no puede superar 100 caracteres.',
            'nombre.regex'      => 'El nombre solo debe contener letras y espacios.',
            'apellido.required' => 'El apellido es obligatorio.',
            'apellido.min'      => 'El apellido debe tener al menos 2 caracteres.',
            'apellido.max'      => 'El apellido no puede superar 100 caracteres.',
            'apellido.regex'    => 'El apellido solo debe contener letras y espacios.',
            'email.required'    => 'El email es obligatorio.',
            'email.email'       => 'Ingresa un email válido.',
            'email.unique'      => 'Este email ya está registrado.',
            'ficha.required'    => 'El número de ficha es obligatorio.',
            'ficha.digits_between' => 'La ficha debe tener entre 4 y 10 dígitos.',
            'programa.required' => 'El programa es obligatorio.',
            'programa.min'      => 'El programa debe tener al menos 3 caracteres.',
            'programa.max'      => 'El programa no puede superar 150 caracteres.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.regex'    => 'El teléfono debe tener entre 6 y 20 caracteres numéricos (puede incluir +, espacios o guiones).',
        ]);

        $estudiante->update($request->all());

        return redirect()->route('estudiantes.index')
                         ->with('success', 'Estudiante actualizado correctamente.');
    }

    // DELETE — Eliminar el estudiante
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()->route('estudiantes.index')
                         ->with('success', 'Estudiante eliminado correctamente.');
    }
}
