<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TraspasoController extends Controller
{
    public function traspaso()
    {
      return view('traspasos.Btraspaso');
    }
    public function rtraspaso()
    {
      return view('traspasos.Rtraspaso');
    }
    public function etraspaso($id){
      return view('traspasos.Etraspaso', ['id' => $id]);
    }
}
