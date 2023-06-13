<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function proveedor(){
        return view('proveedores.Bproveedor');
    }    
    //public function ralumno(){
      //  return view('alumnos.Ralumno');
    //}
    
    //public function ealumno($id){
      //  return view('alumnos.Ealumno', ['id' => $id]);
    //}
}
