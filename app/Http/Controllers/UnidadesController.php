<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnidadesController extends Controller
{
    public function unidad()
    {
      return view('unidades.Bunidad');
    }
    public function runidad()
    {
      return view('unidades.Runidad');
    }
    public function eunidad($id){
      return view('unidades.Eunidad', ['id' => $id]);
    }
}
