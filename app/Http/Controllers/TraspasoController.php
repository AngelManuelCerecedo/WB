<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TraspasoController extends Controller
{
    public function traspaso()
    {
      return view('Traspasos.Btraspaso');
    }
    public function rtraspaso()
    {
      return view('Traspasos.Rtraspaso');
    }
    public function etraspaso($id){
      return view('Traspasos.Etraspaso', ['id' => $id]);
    }
}
