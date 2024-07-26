// js/scripts.js

document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const urlInput = document.getElementById('url');

    form.addEventListener('submit', function(event) {
        if (!validateURL(urlInput.value)) {
            event.preventDefault();
            alert('Por favor, ingrese una URL válida.');
        }
    });

    function validateURL(url) {
        const pattern = new RegExp('^(https?:\\/\\/)?' + // protocolo
            '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|' + // dominio
            '((\\d{1,3}\\.){3}\\d{1,3}))' + // IP (v4) dirección
            '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // puerto y ruta
            '(\\?[;&a-z\\d%_.~+=-]*)?' + // cadena de consulta
            '(\\#[-a-z\\d_]*)?$', 'i'); // fragmento de anclaje
        return !!pattern.test(url);
    }
});
