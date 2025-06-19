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

$username = trim($_POST['username'] ?? '');

if (empty($username)) {
    die("Error: No se recibió el nombre de usuario");
}

$sql = "SELECT id FROM usuarios WHERE LOWER(username) = LOWER(?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // echo "Usuario encontrado: $username"; exit;
    header("Location: /html/reset_password.php?user=" . urlencode($username));
} else {
    // echo "Usuario NO encontrado: $username"; exit;
    header("Location: /html/forgot_password.html?error=user_not_found");
}

$stmt->close();
$conn->close();
?>
