let cropper;
const txtCaminhoImagem = document.getElementById('txtCaminhoImagem');
const previsaoImagem = document.getElementById('previsaoImagem');
const btnUpload = document.getElementById('btnUpload');

txtCaminhoImagem.addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = () => {
            previsaoImagem.src = reader.result;
            previsaoImagem.style.display = 'block';
            if (cropper) {
                cropper.destroy();
            }
            cropper = new Cropper(previsaoImagem, {
                aspectRatio: 1,
                viewMode: 2
            });
            btnUpload.style.display = 'inline';
        };
        reader.readAsDataURL(file);
    }
});

btnUpload.addEventListener('click', () => {
    if (cropper) {
        cropper.getCroppedCanvas().toBlob((blob) => {
            const formData = new FormData();
            formData.append('imgRecorte', blob, 'imgRecorte.png');
            fetch('upload.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.redirectUrl) {
                    window.location.href = data.redirectUrl;
                } else {
                    alert('Erro: ' + data.error || 'Erro desconhecido.');
                }
            })
            .catch(error => {
                console.error('Erro:', error);
            });
        });
    }
});