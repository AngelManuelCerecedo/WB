<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarcasController extends Controller
{
    public function marca()
    {
      return view('marcas.Bmarca');
    }
    public function rmarca()
    {
      return view('marcas.Rmarca');
    }
    public function emarca($id){
      return view('marcas.Emarca', ['id' => $id]);
    }
}
