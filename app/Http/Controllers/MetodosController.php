<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetodosController extends Controller
{
    public function metodo()
    {
      return view('metodos.Bmetodo');
    }
    public function rmetodo()
    {
      return view('metodos.Rmetodo');
    }
    public function emetodo($id){
      return view('metodos.Emetodo', ['id' => $id]);
    }
}
