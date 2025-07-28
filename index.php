<?php

$requestUrl = $_SERVER['REQUEST_URI'];

switch ($requestUrl) {
    case 'american/index':
        require __DIR__ . '/american/index.php';

    case 'admin/envio':
        require __DIR__ . '/admin/envio.php';

    case 'admin/index':
        require __DIR__ . '/admin/index.php';

    case 'admin/retirar':
        require __DIR__ . '/admin/retirar.php';
}
