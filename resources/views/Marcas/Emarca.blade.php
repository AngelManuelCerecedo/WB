@extends('layouts.app')
@section('title', 'Editar Marca')
@section('content')
    @livewire('marca.emarca',['ide' => $id])
@endsection
@section('js')
<script>
    window.addEventListener('swal', event => {
        Swal.fire({
            position: 'mid',
            icon: event.detail.type,
            title: event.detail.title,
            showConfirmButton: false,
        })
    });
</script>
@endsection