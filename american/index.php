<?php

$imagens = glob('../assets/imagens/*.{jpg,jpeg,png,mp4}', GLOB_BRACE);

$quantidade = count($imagens);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sinalização Digital</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body id="bodyPublic">
    <div class="containerPublic">
        <img id="imagem" src="" alt="">
    </div>
    <button id="entrarEmTelaCheia">Entrar em tela Cheia</button>
</body>

<script>
    const button = document.querySelector('button');
    const container = document.querySelector('.containerPublic');
    const element = document.documentElement;

    button.addEventListener('click', () => {

        element.requestFullscreen();

        button.style.display = 'none';
        container.style.display = 'flex';
    });

    document.addEventListener('fullscreenchange', (event) => {
        if (!document.fullscreenElement) {
            button.style.display = 'flex';
            container.style.display = 'none';
        }
    });

    const imagens = <?php echo json_encode($imagens); ?>;

    let indice = 0;
    const delay = 3000;

    const mostrarImagem = () => {
        let imageOrVideo = imagens[indice].split('.').pop();

        const videoExistente = document.querySelector('video');
        if (videoExistente) {
            videoExistente.remove();
        }

        if (imageOrVideo === 'mp4') {
            const img = document.getElementById('imagem');
            img.style.display = 'none';
            const video = document.createElement('video');
            video.src = imagens[indice];
            video.width = 700;
            video.height = 500;
            video.autoplay = true;
            video.muted = true;
            video.playsInline = true;

            container.appendChild(video);
            
            video.onended = () => {
                indice = (indice + 1) % imagens.length;
                mostrarImagem();
            }

            video.onloadedmetadata = () => {
                let duracao = video.duration;
                setTimeout(() => {
                    if(!video.paused) return;
                    indice = (indice + 1) % imagens.length;
                    mostrarImagem();
                }, (isNaN(duracao) ? delay : duracao * 1000) + 200);
            }
        } else {
            const img = document.getElementById('imagem');
            img.style.display = 'flex';
            img.src = imagens[indice];
            indice = (indice + 1) % imagens.length;
            let time = imagens[indice].split('+').pop();
            let DelayProgramado = time.split('.')[0];

            if (Number(DelayProgramado) !== 0) {
                setTimeout(mostrarImagem, DelayProgramado);
            } else {
                setTimeout(mostrarImagem, delay);
            }
        }

    }

    mostrarImagem();
</script>

</html>