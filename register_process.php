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

$username = $_POST['username'];
$password = $_POST['password'];

// Verificar si ya existe el usuario
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Usuario ya existe, redirigir a register con mensaje de error
    header("Location: /html/register.html?error=userexists");
    exit();
}
$stmt->close();

// Hashear la contraseña antes de guardarla
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insertar nuevo usuario con la contraseña hasheada
$stmt = $conn->prepare("INSERT INTO usuarios (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hashed_password);
if ($stmt->execute()) {
    // Registro exitoso, redirigir a login con mensaje éxito
    header("Location: /html/login.html?success=registered");
    exit();
} else {
    // Error al insertar
    echo "Error al crear usuario: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
