<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarcasController extends Controller
{
    public function marca()
    {
      return view('Marcas.Bmarca');
    }
    public function rmarca()
    {
      return view('Marcas.Rmarca');
    }
    public function emarca($id){
      return view('Marcas.Emarca', ['id' => $id]);
    }
}
