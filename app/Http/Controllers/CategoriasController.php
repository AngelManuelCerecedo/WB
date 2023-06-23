<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function categoria()
    {
      return view('categorias.Bcategoria');
    }
    public function rcategoria()
    {
      return view('categorias.Rcategoria');
    }
    public function ecategoria($id){
      return view('categorias.Ecategoria', ['id' => $id]);
    }
}
