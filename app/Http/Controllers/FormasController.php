<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormasController extends Controller
{
    public function forma()
    {
      return view('Formas.Bforma');
    }
    public function rforma()
    {
      return view('Formas.Rforma');
    }
    public function eforma($id){
      return view('Formas.Eforma', ['id' => $id]);
    }
}
