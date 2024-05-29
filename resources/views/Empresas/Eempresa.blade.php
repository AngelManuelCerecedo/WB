@extends('layouts.app')
@section('title', 'Editar Empresa')
@section('content')
    @livewire('empresa.eempresa', ['ide' => $id])
@endsection
