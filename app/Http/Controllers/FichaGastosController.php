<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FichaGastosController extends Controller
{
    public function ficha()
    {
        return view('FichaG.Bficha');
    }
    public function rficha()
    {
        return view('FichaG.Rficha');
    }
    public function eficha($id)
    {
        return view('FichaG.Eficha', ['id' => $id]);
    }
}
