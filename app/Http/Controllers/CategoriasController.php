<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function categoria()
    {
      return view('Categorias.Bcategoria');
    }
    public function rcategoria()
    {
      return view('Categorias.Rcategoria');
    }
    public function ecategoria($id){
      return view('Categorias.Ecategoria', ['id' => $id]);
    }
}
