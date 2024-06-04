<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FichaIngresoController extends Controller
{
    public function ficha()
    {
      return view('Fichas.Bficha');
    }
    public function rficha()
    {
      return view('Fichas.Rficha');
    }
    public function eficha($id)
    {
      return view('Fichas.Eficha', ['id' => $id]);
    }
}
