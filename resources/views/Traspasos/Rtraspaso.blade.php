@extends('layouts.app')
@section('title', 'Resgistrar Traspaso')
@section('content')
    @livewire('traspaso.rtraspaso')
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
