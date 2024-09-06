@extends('layouts.app')
@section('title', 'Editar Factura')
@section('content')
    @livewire('factura.efactura2', ['ide' => $id])
@endsection
