<?php
session_start();
session_destroy();
header("Location: /html/pagina_inicio.html");
exit();
?>
