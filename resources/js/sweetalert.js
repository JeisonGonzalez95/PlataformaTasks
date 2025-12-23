document.addEventListener('DOMContentLoaded', function () {
    const alertaElemento = document.getElementById('alerta-data');
    if (alertaElemento) {
        const datosAlerta = JSON.parse(alertaElemento.value);

        Swal.fire({
            title: datosAlerta.titulo ?? 'Atención',
            text: datosAlerta.mensaje ?? 'Algo sucedió',
            icon: datosAlerta.icono ?? 'info',
            confirmButtonText: datosAlerta.confirmarTexto ?? 'Aceptar',
            showCancelButton: datosAlerta.mostrarCancelar ?? false,
            cancelButtonText: datosAlerta.cancelarTexto ?? 'Cancelar',
        });
    }
    const botonesEliminar = document.querySelectorAll('.btn-delete');

    botonesEliminar.forEach(function (boton) {
        boton.addEventListener('click', function () {
            const url = boton.getAttribute('data-url');

            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción no se puede deshacer',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });
});
