<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function almacen()
    {
      return view('Almacenes.Balmacen');
    }
    public function ralmacen($id)
    {
      return view('Almacenes.Ralmacen', ['id' => $id]);
    }
    public function ealmacen($id){
      return view('Almacenes.Ealmacen', ['id' => $id]);
    }
}
