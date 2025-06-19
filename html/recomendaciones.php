<?php
session_start();
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'goodbooks';
$socket = '/opt/lampp/var/mysql/mysql.sock';

$conn = new mysqli($host, $user, $password, $dbname, null, $socket);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Libros sin reseñas aún
$query_no_reviews = "SELECT Title, Author FROM libros WHERE Title NOT IN (SELECT DISTINCT Title FROM reviews) ORDER BY Title";
$result_no_reviews = $conn->query($query_no_reviews);

// Todos los libros para recomendaciones
$query_all_books = "SELECT Title, Author, Genre FROM libros ORDER BY Title";
$result_all_books = $conn->query($query_all_books);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recomendaciones - GoodBooks</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#131416] text-white p-6">

<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#2c3035] px-10 py-3">
    <div class="flex items-center gap-4 text-white">
        <div class="size-4">
            <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M44 4H30.6666V17.3334H17.3334V30.6666H4V44H44V4Z" fill="currentColor"></path>
            </svg>
        </div>
        <h2 class="text-white text-lg font-bold leading-tight tracking-[-0.015em]">GoodBooks</h2>
        <?php if (isset($_SESSION['username'])): ?>
            <span class="ml-4 text-[#a3abb2] font-semibold">Hola, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
        <?php endif; ?>
    </div>
    <div class="flex gap-6 items-center">
        <a class="text-white text-sm font-medium leading-normal" href="/html/pagina_inicio.php">Inicio</a>
        <a class="text-white text-sm font-medium leading-normal" href="/html/recomendaciones.php">Recomendaciones</a>
        <a class="text-white text-sm font-medium leading-normal" href="/html/reseñas.php">Reseñas</a>
        <a class="text-white text-sm font-medium leading-normal" href="/html/nueva_reseña.php">Nueva Reseña</a>
        <?php if (isset($_SESSION['username'])): ?>
            <a href="/logout.php" class="ml-4 flex min-w-[84px] items-center justify-center rounded-full h-10 px-4 bg-red-500 text-white text-sm font-bold">Logout</a>
        <?php else: ?>
            <a href="/html/login.html" class="ml-4 flex min-w-[84px] items-center justify-center rounded-full h-10 px-4 bg-[#2c3035] text-white text-sm font-bold">Login</a>
        <?php endif; ?>
    </div>
</header>

<h1 class="text-3xl font-bold mb-6">Libros sin reseñas aún</h1>

<?php if ($result_no_reviews->num_rows > 0): ?>
    <ul class="list-disc pl-6 space-y-1 mb-10">
        <?php while ($row = $result_no_reviews->fetch_assoc()): ?>
            <li><strong><?php echo htmlspecialchars($row['Title']); ?></strong> - <?php echo htmlspecialchars($row['Author']); ?></li>
        <?php endwhile; ?>
    </ul>
<?php else: ?>
    <p>No hay libros sin reseñas aún. ¡Felicitaciones!</p>
<?php endif; ?>

<br>
<h2 class="text-2xl font-semibold mb-4">Recomendaciones</h2>
<?php if ($result_all_books->num_rows > 0): ?>
    <ul class="list-disc pl-6 space-y-1">
        <?php while ($book = $result_all_books->fetch_assoc()): ?>
            <li><strong><?php echo htmlspecialchars($book['Title']); ?></strong> - <?php echo htmlspecialchars($book['Author']); ?> (<?php echo htmlspecialchars($book['Genre']); ?>)</li>
        <?php endwhile; ?>
    </ul>
<?php else: ?>
    <p>No hay libros para mostrar.</p>
<?php endif; ?>

<?php $conn->close(); ?>

</body>
</html>
