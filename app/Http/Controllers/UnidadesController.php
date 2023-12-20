<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnidadesController extends Controller
{
    public function unidad()
    {
      return view('Unidades.Bunidad');
    }
    public function runidad()
    {
      return view('Unidades.Runidad');
    }
    public function eunidad($id){
      return view('Unidades.Eunidad', ['id' => $id]);
    }
}
