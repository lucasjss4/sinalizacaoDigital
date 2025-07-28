<?php
session_start();

if ((!isset($_SESSION['login']) == true) && (!isset($_SESSION['senha']) == true)) {
    header("Location:index.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sinalização Digital</title>

    <link rel="stylesheet" href="../assets/style.css" type="text/css">
</head>

<body>
    <div class="container">
        <form id="formEnvio" action="../upload.php" enctype="multipart/form-data" method="post">
            <input type="file" name="file[]" multiple>
            <button type="submit">Enviar</button>
        </form>

        <a href="../logout.php"><button id="logout" type="submit">Logout</button></a>
        <a href="./retirar.php"><button id="enviar" type="submit">Excluir Imagens</button></a>

    </div>
</body>

</html>