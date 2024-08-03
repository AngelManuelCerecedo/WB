@extends('layouts.app')
@section('title', 'Editar Beneficiario')
@section('content')
    @livewire('beneficiario.ebeneficiario',['ide' => $id])
@endsection
