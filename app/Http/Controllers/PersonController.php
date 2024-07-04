<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Person=Person::all();
        return view('dashboard.person.index',['person'=>$Person]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.person.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|string|max:20',
            'name' => 'required|string|max:100',
            'document_type' => 'nullable|string|max:20',
            'document_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:70',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:50',
        ]);

        // Creación de la persona en la base de datos
        Person::create($validatedData);

        // Redirecciona a la lista de personas con un mensaje
        return redirect()->route('person.index')->with('success', '¡Persona creada exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Person=Person::find($id);
        return view('dashboard.person.edit',['person'=>$Person]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       // Validación de datos recibidos del formulario
       $request->validate([
        'name' => 'required|string|max:100',
        'document_type' => 'nullable|string|max:20',
        'document_number' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:70',
        'phone' => 'nullable|string|max:20',
        'email' => 'nullable|email|max:50',
        ]);

    // Buscar el modelo Person por su ID
    $person = Person::find($id);

    // Actualizar los campos del modelo con los datos del formulario
    $person->name = $request->input('name');
    $person->document_type = $request->input('document_type');
    $person->document_number = $request->input('document_number');
    $person->address = $request->input('address');
    $person->phone = $request->input('phone');
    $person->email = $request->input('email');

    // Guardar los cambios en la base de datos
    $person->save();

    // Redirigir a la vista de detalle de la persona o a otra vista según tu aplicación
    return redirect()->route('person.show', $person->id)->with('success', '¡Persona actualizada correctamente!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        //
    }
}
