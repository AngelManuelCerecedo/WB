@extends('layouts.app')
@section('title', 'Editar Ficha Ingreso')
@section('content')
    @livewire('ficha-i.eficha',['ide' => $id])
@endsection
