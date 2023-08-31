<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function empleado()
    {
      return view('empleados.Bempleado');
    }
    public function rempleado()
    {
      return view('empleados.Rempleado');
    }
    public function eempleado($id){
      return view('empleados.Eempleado', ['id' => $id]);
    }
}
