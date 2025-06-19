<?php
$page = $_GET['page'] ?? 'pagina_inicio';
$valid_pages = [
    'login',
    'pagina_inicio',
    'quiero_leer',
    'recomendaciones',
    'reseña_por_genero',
    'reseñas'
];

if (in_array($page, $valid_pages)) {
    include 'html/' . $page . '.html';
} else {
    echo "<h2>Página no encontrada</h2>";
}

?>
