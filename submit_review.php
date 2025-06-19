<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'goodbooks';
$socket = '/opt/lampp/var/mysql/mysql.sock';

$conn = new mysqli($host, $user, $password, $dbname, null, $socket);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Generar ID único numérico
function generateUniqueId() {
    return rand(100000, 999999);
}

// Generar User ID alfanumérico
function generateUserId($length = 14) {
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $userId = '';
    for ($i = 0; $i < $length; $i++) {
        $userId .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $userId;
}

// Obtener valores del formulario
$title = $_POST['title'];
$price = $_POST['price'];
$profileName = $_POST['profileName'];
$review_score = $_POST['review_score'];
$review_summary = $_POST['review_summary'];
$review_text = $_POST['review_text'];

$id = generateUniqueId();
$user_id = generateUserId();
$review_helpfulness = "0/0";
$review_time = time();

$sql = "INSERT INTO reviews (
    Id, Title, Price, User_id, profileName, review_helpfulness, 
    review_score, review_time, review_summary, review_text
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ssdssssiss",
    $id,
    $title,
    $price,
    $user_id,
    $profileName,
    $review_helpfulness,
    $review_score,
    $review_time,
    $review_summary,
    $review_text
);


if ($stmt->execute()) {
    // Redirigir con indicador de éxito
    header("Location: /html/pagina_inicio.html?success=1");
    exit();
} else {
    echo "Error al insertar la reseña.";
}


$stmt->close();
$conn->close();
?>
