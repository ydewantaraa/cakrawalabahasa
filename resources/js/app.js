import './bootstrap';

import Alpine from 'alpinejs';

import Swal from 'sweetalert2'


window.Alpine = Alpine;

/**
 * Global Modal Store
 * Digunakan untuk semua halaman & semua menu
 */
document.addEventListener('alpine:init', () => {
    Alpine.store('modal', {
        open: false,
        title: '',
        content: '',

        show(title, content) {
            this.title = title
            this.content = content
            this.open = true
        },

        close() {
            this.open = false
            this.title = ''
            this.content = ''
        }
    })
})


/**
 * Global Alert Store (SweetAlert)
 */
Alpine.store('alert', {
    confirm(options = {}, callback = null) {
        Swal.fire({
            title: options.title ?? 'Yakin?',
            text: options.text ?? 'Aksi ini tidak bisa dibatalkan',
            icon: options.icon ?? 'warning',
            showCancelButton: true,
            confirmButtonText: options.confirmText ?? 'Ya',
            cancelButtonText: options.cancelText ?? 'Batal',
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280',
        }).then(result => {
            if (result.isConfirmed && callback) callback()
        })
    },

    success(message) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: message,
            timer: 2000,
            showConfirmButton: false
        })
    },

    error(message) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: message
        })
    }
})

Alpine.start();
