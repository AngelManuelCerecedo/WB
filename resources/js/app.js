import './bootstrap';

import Alpine from 'alpinejs';
import Swal from 'sweetalert2';
window.Alpine = Alpine;

Alpine.start();
window.addEventListener('swal', event => {
    Swal.fire({
        position: 'mid',
        icon: event.detail.type,
        title: event.detail.title,
        showConfirmButton: false,
    });
});