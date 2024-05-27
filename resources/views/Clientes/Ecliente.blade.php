@extends('layouts.app')
@section('title', 'Editar Cliente')
@section('content')
    @livewire('cliente.ecliente',['ide' => $id])
@endsection
