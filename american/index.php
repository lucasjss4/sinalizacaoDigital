<?php

$imagens = glob('../assets/imagens/*.{jpg,jpeg,png}', GLOB_BRACE);

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
    const container = document.querySelector('.container');
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
        const img = document.getElementById('imagem');
        img.src = imagens[indice];
        indice = (indice + 1) % imagens.length;
        setTimeout(mostrarImagem, delay);
    }

    mostrarImagem();
</script>

</html>