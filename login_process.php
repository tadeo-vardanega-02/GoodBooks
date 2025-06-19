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

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    header("Location: /html/login.html?error=empty");
    exit();
}

$stmt = $conn->prepare("SELECT password FROM usuarios WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($hashed_password);

if ($stmt->fetch()) {
    if (password_verify($password, $hashed_password)) {
        $_SESSION['username'] = $username;
        header("Location: /html/pagina_inicio_usuario.php");
        exit();
    } else {
        header("Location: /html/login.html?error=invalid");
        exit();
    }
} else {
    // Usuario no encontrado
    header("Location: /html/login.html?error=invalid");
    exit();
}

$stmt->close();
$conn->close();
?>
