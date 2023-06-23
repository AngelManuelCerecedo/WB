@extends('layouts.app')
@section('title', 'ResgistrarForma')
@section('content')
@livewire('forma.rforma')
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