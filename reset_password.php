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

$username = trim($_POST['username']);
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

if ($new_password !== $confirm_password) {
    header("Location: /html/reset_password.php?user=" . urlencode($username) . "&error=nomatch");
    exit();
}

if (empty($username)) {
    header("Location: /html/reset_password.php?error=nouser");
    exit();
}

// Verificar que el usuario exista
$checkSql = "SELECT id FROM usuarios WHERE username = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("s", $username);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows === 0) {
    $checkStmt->close();
    header("Location: /html/reset_password.php?user=" . urlencode($username) . "&error=usernotfound");
    exit();
}
$checkStmt->close();

$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

$sql = "UPDATE usuarios SET password = ? WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $hashed_password, $username);
$stmt->execute();

// Debug - Para ver cuántas filas afectó
// echo "Filas afectadas: " . $stmt->affected_rows;

if ($stmt->affected_rows > 0) {
    header("Location: /html/login.html?success=reset");
} else {
    // Si no actualizó, puede ser porque la contraseña es igual a la anterior
    header("Location: /html/reset_password.php?user=" . urlencode($username) . "&error=failed");
}

$stmt->close();
$conn->close();
?>
reset