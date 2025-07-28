<?php
session_start();

if (!isset($_SESSION['test_counter'])) {
    $_SESSION['test_counter'] = 1;
    echo "Primeira visita. Contador inicializado em: " . $_SESSION['test_counter'];
} else {
    $_SESSION['test_counter']++;
    echo "Você visitou esta página " . $_SESSION['test_counter'] . " vezes.";
}

echo "<br>";
echo "ID da Sessão: " . session_id();
echo "<br>";
echo "Caminho de salvamento da sessão: " . session_save_path();
echo "<br>";
echo "Conteúdo de \$_SESSION: <pre>";
print_r($_SESSION);
echo "</pre>";

// Tente recarregar a página várias vezes e veja se o contador aumenta.
?>