<?php
session_start();

if (!isset($_SESSION['logado']) && $_SESSION['logado'] !== true) {
     $urlIndex = "https://" . $_SERVER['HTTP_HOST'] . '/admin/index';

    header("Location:" . $urlIndex);
    exit();
}

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

<body>
    <div class="container">
        <div class="containerImgs">
        </div>

        <a href="../logout.php"><button id="logout" type="submit">Logout</button></a>
        <a href="./envio.php"><button id="enviar" type="submit">Enviar Imagens</button></a>
    </div>
</body>

<script>
    const container = document.querySelector('.containerImgs');

    const imagens = <?php echo json_encode($imagens); ?>;
    const count = <?php echo $quantidade; ?>;

    for (let i = 0; i < count; i++) {
        const card = document.createElement('div');
        card.className = 'card';
        const img = document.createElement('img');
        img.src = imagens[i];
        card.appendChild(img);
        const p = document.createElement('p');
        p.textContent = imagens[i].split('/').pop();
        card.appendChild(p);
        const btn = document.createElement('button');
        btn.textContent = 'Excluir';
        btn.setAttribute('data-id', imagens[i].split('/').pop());
        btn.addEventListener('click', function () {

            const origem = this.getAttribute('data-id');

            window.location.href = 'excluir.php?origem=' + encodeURIComponent(origem);
        })
        card.appendChild(btn);
        container.appendChild(card);
    }
</script>

</html>