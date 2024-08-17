@extends('layouts.app')
@section('title', 'Editar Factura')
@section('content')
    @livewire('factura.efactura', ['ide' => $id])
@endsection
