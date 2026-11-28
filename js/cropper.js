let cropper;
const txtCaminhoImagem = document.getElementById('txtCaminhoImagem');
const previsaoImagem = document.getElementById('previsaoImagem');
const btnUpload = document.getElementById('btnUpload');

btnUpload.style.display = 'none';

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
            btnUpload.textContent = 'APLICAR RECORTE';
        };

        reader.readAsDataURL(file);
    }
});

btnUpload.addEventListener('click', () => {
    if (cropper) {
        cropper.getCroppedCanvas({
            width: 300,
            height: 300
        }).toBlob((blob) => {
            if (!blob) {
                alert('Não foi possível recortar a imagem.');
                return;
            }

            const imagemRecortada = new File (
                [blob],
                'foto-perfil.png',
                { type: 'image/png' }
            );
            
            // substituindo o arquivo original pelo recortado
            const arquivos = new DataTransfer();
            arquivos.items.add(imagemRecortada);

            txtCaminhoImagem.files = arquivos.files;

            // atualia a previa para mostrar o recorte aplicado
            previsaoImagem.src = URL.createObjectURL(imagemRecortada);

            cropper.destroy();
            cropper = null;

            btnUpload.textContent = 'RECORTE APLICADO';
        });
    }
});