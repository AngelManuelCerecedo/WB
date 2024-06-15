@extends('layouts.app')
@section('title', 'Editar Ficha Gastos')
@section('content')
    @livewire('fichag.e-ficha',['ide' => $id])
@endsection
