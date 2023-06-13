@extends('layouts.app')
@section('title', 'Buscar Proveedor')
@section('content')
@livewire('proveedor.bproveedor')
@endsection
@section('js')
    <script>
        window.addEventListener('swal', event => {
            Swal.fire({
                title: event.detail.title,
                text: event.detail.text,
            })
        });
        //Eliminado
        window.addEventListener('swal:confirm', event => {
            Swal.fire({
                    title: event.detail.title,
                    text: "¡No podrás revertir esto!",
                    icon: event.detail.type,
                    showCancelButton: true,
                    cancelButtonColor: '#D5C28B',
                    confirmButtonColor: '#78163B',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Eliminar',
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.livewire.emit('delete', event.detail.id);
                        Swal.fire(
                            'Eliminado',
                            'El registro se eliminó exitosamente',
                            'success',

                        )

                    } else {
                        window.livewire.emit('', event.detail.id);
                    }
                });
        });
    </script>
@endsection