require('./bootstrap');
require('./sweetalert');
require('./validatePsw');

document.addEventListener('DOMContentLoaded', function () {

    $('.table').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json' // Traducción al español
        }
    });


    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const contentWrapper = document.querySelector('.content-wrapper');
    const resizableContent = document.querySelector('.resizable-content');
    const listasSubmenu = document.getElementById('listasSubmenu');

    if (menuToggle) {


        menuToggle.addEventListener('click', function () {
            const isHidden = sidebar.classList.toggle('hidden');

            if (isHidden) {
                contentWrapper.style.marginLeft = '0';
                contentWrapper.style.width = '100%';
                resizableContent.style.width = '100%';
            } else {
                contentWrapper.style.marginLeft = '100px';
                contentWrapper.style.width = 'calc(100% - 25px)';
                resizableContent.style.width = 'calc(100% - 25px)';
            }
        });

    }


    window.mostrarFormulario = function (btn) {
        const formularioId = btn.getAttribute('data-form');
        const dataTypes = ['taskId'];

        document.querySelectorAll('.formulario').forEach(f => f.style.display = 'none');

        const formulario = document.getElementById(formularioId);
        if (formulario) {
            formulario.style.display = 'block';
        }

        for (const type of dataTypes) {
            if (btn.dataset[type]) {
                const data = JSON.parse(btn.dataset[type]);

                const fillMap = {
                    taskId: {
                        'task_id': 'id',
                        'title_t': 'title',
                        'desc_t': 'description',
                        'pri_t': 'priority',
                        'date_t': 'due_date'
                    }
                };

                const fields = fillMap[type];
                for (const [fieldName, dataKey] of Object.entries(fields)) {

                    const field = document.querySelector(`[name="${fieldName}"]`);
                    const value = data[dataKey] ?? '';

                    field.value = value;
                }
            }
            break;
        }
    };



    var input = document.getElementById('document');
    var preview = document.getElementById('filePreview');
    if (input && preview) {
        input.addEventListener('change', function () {
            preview.innerHTML = '';

            var files = input.files;
            if (!files.length) {
                preview.innerHTML = '<span class="text-muted">Vista previa del archivo seleccionado</span>';
                return;
            }
            Array.from(files).forEach(function (file) {
                var reader = new FileReader();
                if (file.type.startsWith('image/')) {
                    reader.onload = function (e) {
                        var img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'img-fluid rounded m-2';
                        img.style.maxHeight = '150px';
                        preview.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                } else if (file.type === 'application/pdf') {
                    var pdfPreview = document.createElement('div');
                    pdfPreview.className = 'd-flex flex-column align-items-center m-2';
                    pdfPreview.innerHTML = "\n                        <i class=\"fas fa-file-pdf fa-3x text-danger mb-2\"></i>\n                        <p class=\"mb-0\">".concat(file.name, "</p>\n                    ");
                    preview.appendChild(pdfPreview);
                } else {
                    var error = document.createElement('p');
                    error.className = 'text-danger';
                    error.textContent = "Archivo no soportado: ".concat(file.name);
                    preview.appendChild(error);
                }
            });
        });
    }


});
