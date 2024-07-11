<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function empresa()
    {
      return view('Empresas.Bempresa');
    }
    public function rempresa()
    {
      return view('Empresas.Rempresa');
    }
    public function eempresa($id)
    {
      return view('Empresas.Eempresa', ['id' => $id]);
    }
}
