@extends('layouts.app')
@section('title', 'Editar Forma Pago')
@section('content')
    @livewire('forma.eforma',['ide' => $id])
@endsection
