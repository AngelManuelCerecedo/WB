<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function empresa()
    {
      return view('empresas.Bempresa');
    }
    public function rempresa()
    {
      return view('empresas.Rempresa');
    }
    public function eempresa($id)
    {
      return view('empresas.Eempresa', ['id' => $id]);
    }
}
