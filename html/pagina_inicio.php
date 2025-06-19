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

// Estadísticas rápidas
$total_books = $conn->query("SELECT COUNT(*) AS total FROM libros")->fetch_assoc()['total'];
$total_reviews = $conn->query("SELECT COUNT(*) AS total FROM reviews")->fetch_assoc()['total'];
$books_without_reviews = $conn->query("SELECT COUNT(*) AS total FROM libros WHERE Title NOT IN (SELECT DISTINCT Title FROM reviews)")->fetch_assoc()['total'];

// Libros con reseñas (título + autor + calificación promedio)
$query_books_reviews = "
    SELECT l.Title, l.Author, IFNULL(AVG(r.review_score), 0) AS avg_rating
    FROM libros l
    LEFT JOIN reviews r ON l.Title = r.Title
    GROUP BY l.Title, l.Author
    ORDER BY avg_rating DESC, l.Title
";
$result_books_reviews = $conn->query($query_books_reviews);

// Últimas 5 reseñas
$query_recent_reviews = "
    SELECT r.Title, r.review_text, r.review_score, r.profileName, r.review_time
    FROM reviews r
    ORDER BY r.review_time DESC
    LIMIT 5
";
$result_recent_reviews = $conn->query($query_recent_reviews);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio - GoodBooks</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#131416] text-white p-6 min-h-screen">

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

<main class="mt-8 px-10">
    <section class="mb-8">
        <h2 class="text-2xl font-semibold mb-4">Estadísticas rápidas</h2>
        <div class="flex gap-8">
            <div><strong>Total de libros:</strong> <?php echo $total_books; ?></div>
            <div><strong>Total de reseñas:</strong> <?php echo $total_reviews; ?></div>
            <div><strong>Libros sin reseñas:</strong> <?php echo $books_without_reviews; ?></div>
        </div>
    </section>

    <section class="mb-8">
        <h2 class="text-2xl font-semibold mb-4">Libros con reseñas (ordenados por calificación)</h2>
        <ul class="list-disc pl-6 space-y-2 max-h-96 overflow-y-auto">
            <?php while ($row = $result_books_reviews->fetch_assoc()): ?>
                <li>
                    <strong><?php echo htmlspecialchars($row['Title']); ?></strong> por <?php echo htmlspecialchars($row['Author']); ?>
                    — Calificación promedio: <?php echo number_format($row['avg_rating'], 2); ?>
                </li>
            <?php endwhile; ?>
        </ul>
    </section>

    <section>
        <h2 class="text-2xl font-semibold mb-4">Últimas reseñas</h2>
        <?php if ($result_recent_reviews->num_rows > 0): ?>
            <ul class="space-y-6 max-h-96 overflow-y-auto">
                <?php while ($review = $result_recent_reviews->fetch_assoc()): ?>
                    <li class="bg-[#2c3035] p-4 rounded-lg">
                        <strong><?php echo htmlspecialchars($review['Title']); ?></strong>
                        <p>Por <em><?php echo htmlspecialchars($review['profileName']); ?></em> el <?php echo htmlspecialchars($review['review_time']); ?></p>
                        <p>Calificación: <?php echo $review['review_score']; ?>/5</p>
                        <p><?php echo nl2br(htmlspecialchars($review['review_text'])); ?></p>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No hay reseñas recientes.</p>
        <?php endif; ?>
    </section>
</main>

</body>
</html>

<?php $conn->close(); ?>
