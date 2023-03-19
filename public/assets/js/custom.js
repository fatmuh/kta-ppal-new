function previewImage() {
    const foto = document.querySelector('#foto');
    const fotoPreview = document.querySelector('.foto-preview');

    fotoPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(foto.files[0]);

    oFReader.onload = function(oFREvent) {
        fotoPreview.src = oFREvent.target.result;
    }
}

function previewTtd() {
    const ttd = document.querySelector('#ttd');
    const ttdPreview = document.querySelector('.ttd-preview');

    ttdPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(ttd.files[0]);

    oFReader.onload = function(oFREvent) {
        ttdPreview.src = oFREvent.target.result;
    }
}

