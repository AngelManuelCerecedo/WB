@extends('layouts.app')
@section('title', 'Editar FormaPago')
@section('content')
    @livewire('forma.eforma',['ide' => $id])
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