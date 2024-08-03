<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeneficiarioController extends Controller
{
    public function beneficiarios()
    {
      return view('Beneficiarios.Bbeneficiario');
    }
    public function rbeneficiario()
    {
      return view('Beneficiarios.Rbeneficiario');
    }
    public function ebeneficiario($id)
    {
      return view('Beneficiarios.Ebeneficiario', ['id' => $id]);
    }
}
