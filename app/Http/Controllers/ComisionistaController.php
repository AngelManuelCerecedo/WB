<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComisionistaController extends Controller
{
    public function comisionista()
    {
      return view('Comisionistas.Bcomisionista');
    }
    public function rcomisionista()
    {
      return view('Comisionistas.Rcomisionista');
    }
    public function ecomisionista($id)
    {
      return view('Comisionistas.Ecomisionista', ['id' => $id]);
    }
}
