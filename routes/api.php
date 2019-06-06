<?php

use Illuminate\Http\Request;
use App\Empleado;

//listar todos los empleados empleados
Route::get('empleados',function(){
    $empleados = Empleado::get();
    return $empleados;
});

//listar un solo empleado
Route::get('empleados/{id}', function($id){
    $empleado = Empleado::findOrFail($id);
    return $empleado;
});

//guardar empleados
Route::post('empleados',function(Request $request){  
   //validar campos
   $request->validate([
        'nombres'=>'required|max:50',
        'apellido'=>'required|max:50',
        'cedula'=>'required|max:50',
        'email'=>'required|max:50|email|unique:empleados',
        'lugar_nacimiento'=>'required|max:50',
        'sexo'=>'required|max:50',
        'estado_civil'=>'required|max:50',
        'telefono'=>'required|numeric',

    ]);
    //guardar campos
    $empleado = new Empleado();
    $empleado->nombres = $request->input("nombres");
    $empleado->apellido = $request->input("apellido");
    $empleado->cedula = $request->input("cedula");
    $empleado->email = $request->input("email");
    $empleado->lugar_nacimiento = $request->input("lugar_nacimiento");
    $empleado->sexo = $request->input("sexo");
    $empleado->estado_civil = $request->input("estado_civil");
    $empleado->telefono = $request->input("telefono");

    $empleado->save();
    return ("Empleado creado");
});

//editar un empleado
Route::put('empleados/{id}',function(Request $request, $id){
    
    //validar campos
   $request->validate([
    'nombres'=>'required|max:50',
    'apellido'=>'required|max:50',
    'cedula'=>'required|max:50',
    'email'=>'required|max:50|email|unique:empleados,email,'.$id,
    'lugar_nacimiento'=>'required|max:50',
    'sexo'=>'required|max:50',
    'estado_civil'=>'required|max:50',
    'telefono'=>'required|numeric',

]);
    //busco el empleado por el ID
    $empleado = Empleado::findOrFail($id);
    //Edito los campos que necesite
    $empleado->nombres = $request->input("nombres");
    $empleado->apellido = $request->input("apellido");
    $empleado->cedula = $request->input("cedula");
    $empleado->email = $request->input("email");
    $empleado->lugar_nacimiento = $request->input("lugar_nacimiento");
    $empleado->sexo = $request->input("sexo");
    $empleado->estado_civil = $request->input("estado_civil");
    $empleado->telefono = $request->input("telefono");

    $empleado->save();
    return ("empleado actualizado");
});


//Eliminar un Empleado
Route::delete('empleados/{id}',function($id){
    $empleado = Empleado::findOrFail($id);
    $empleado->delete();
    return ("Empleado eliminados:"); 
});

