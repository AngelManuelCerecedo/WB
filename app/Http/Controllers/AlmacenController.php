<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function almacen()
    {
      return view('almacenes.Balmacen');
    }
    public function ralmacen($id)
    {
      return view('almacenes.Ralmacen', ['id' => $id]);
    }
    public function ealmacen($id){
      return view('almacenes.Ealmacen', ['id' => $id]);
    }
}
