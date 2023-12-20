<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetodosController extends Controller
{
    public function metodo()
    {
      return view('Metodos.Bmetodo');
    }
    public function rmetodo()
    {
      return view('Metodos.Rmetodo');
    }
    public function emetodo($id){
      return view('Metodos.Emetodo', ['id' => $id]);
    }
}
