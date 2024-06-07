@extends('layouts.app')
@section('title', 'Editar Comisionista')
@section('content')
    @livewire('comisionista.ecomisionista',['ide' => $id])
@endsection
