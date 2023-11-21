@extends('layouts.app')
@section('title', 'Editar Rol')
@section('content')
    @livewire('roles.e-rol',['ide' => $id])
@endsection
@section('js')
@endsection