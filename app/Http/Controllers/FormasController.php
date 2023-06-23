<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormasController extends Controller
{
    public function forma()
    {
      return view('formas.Bforma');
    }
    public function rforma()
    {
      return view('formas.Rforma');
    }
    public function eforma($id){
      return view('formas.Eforma', ['id' => $id]);
    }
}
