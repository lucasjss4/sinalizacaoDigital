<?php

$imagens = glob('../assets/imagens/*.{jpg,jpeg,png}', GLOB_BRACE);

$quantidade = count($imagens);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            margin: 0;
            background-color: black;
        }

        .container {
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            display: none;
        }

        #imagem {
            width: 700px;
            height: 700px;
            border: 1px solid white;
        }
    </style>

</head>

<body>
    <div class="container">
        <img id="imagem" src="" alt="">
    </div>
    <button>Entrar em tela Cheia</button>
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