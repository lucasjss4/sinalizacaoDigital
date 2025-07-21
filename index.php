<?php

$requestUrl = $_SERVER['REQUEST_URI'];

switch ($requestUrl) {
    case 'american/index':
        require __DIR__ . '/american/index.php';

    case 'admin/index':
        require __DIR__ . '/admin/index.php';
}
