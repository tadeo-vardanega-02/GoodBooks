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

$query = "SELECT `Title`, `review_summary`, `review_text`, `review_score`, `profileName` FROM reviews";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reseñas - GoodBooks</title>
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
        <div class="flex items-center gap-9">
            <a class="text-white text-sm font-medium leading-normal" href="/html/pagina_inicio.php">Inicio</a>
            <a class="text-white text-sm font-medium leading-normal" href="/html/recomendaciones.php">Recomendaciones</a>
            <a class="text-white text-sm font-medium leading-normal" href="/html/reseñas.php">Reseñas</a>
            <a class="text-white text-sm font-medium leading-normal" href="/html/nueva_reseña.php">Nueva Reseña</a>
        </div>
        <?php if (isset($_SESSION['username'])): ?>
            <a href="/logout.php" class="ml-4 flex min-w-[84px] items-center justify-center rounded-full h-10 px-4 bg-red-500 text-white text-sm font-bold">Logout</a>
        <?php else: ?>
            <a href="/html/login.html" class="ml-4 flex min-w-[84px] items-center justify-center rounded-full h-10 px-4 bg-[#2c3035] text-white text-sm font-bold">Login</a>
        <?php endif; ?>
    </div>
</header>

<h1 class="text-2xl font-bold mb-6">Todas las reseñas</h1>

<div class="space-y-6">
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="bg-[#1e2124] p-6 rounded shadow">
            <h2 class="text-xl font-bold mb-1"><?php echo htmlspecialchars($row['Title']); ?></h2>
            <?php if (!empty($row['review_summary'])): ?>
                <p class="italic mb-2 text-[#a3abb2]">"<?php echo htmlspecialchars($row['review_summary']); ?>"</p>
            <?php endif; ?>
            <p class="mb-3 whitespace-pre-line"><?php echo htmlspecialchars($row['review_text']); ?></p>
            <p class="text-sm text-[#bcd0e5] mb-1">
                <strong>Por:</strong> <?php echo htmlspecialchars($row['profileName']); ?>
            </p>
            <p class="text-sm text-yellow-400 font-semibold">
                <?php 
                    // Mostrar estrellas con unicode (★ = lleno, ☆ = vacío)
                    $score = (int)$row['review_score'];
                    for ($i = 1; $i <= 5; $i++) {
                        echo $i <= $score ? '★' : '☆';
                    }
                ?>
                <span class="text-white ml-2"><?php echo $score; ?>/5</span>
            </p>
        </div>
    <?php endwhile; ?>
</div>

</body>
</html>

<?php $conn->close(); ?>
