@extends('layouts.app')
@section('title', 'Editar Metodo Pago')
@section('content')
    @livewire('metodo.emetodo',['ide' => $id])
@endsection
