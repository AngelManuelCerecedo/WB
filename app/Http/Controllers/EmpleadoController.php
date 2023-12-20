<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function empleado()
    {
      return view('Empleados.Bempleado');
    }
    public function rempleado()
    {
      return view('Empleados.Rempleado');
    }
    public function eempleado($id){
      return view('Empleados.Eempleado', ['id' => $id]);
    }
}
