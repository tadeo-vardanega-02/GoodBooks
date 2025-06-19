<?php
session_start();

if (!isset($_SESSION['username'])) {
    // No está logueado
    header("Location: /html/login.html");
    exit();
}

// Si está logueado, redirigir a inicio del usuario
header("Location: /html/pagina_inicio_usuario.php");
exit();
?>
