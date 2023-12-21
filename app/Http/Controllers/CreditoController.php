<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreditoController extends Controller
{
    public function credito()
    {
      return view('Creditos.Bcredito');
    }
    public function ecredito($id){
      return view('Creditos.Ecredito', ['id' => $id]);
    }
}
