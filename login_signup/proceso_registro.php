<?php
// Conexión a la base de datos (deberías crear un archivo separado para esto)
$servidor = "localhost";
$usuario_db = "root"; // Usuario de tu base de datos
$contrasena_db = ""; // Contraseña de tu base de datos
$nombre_db = "belcar"; // Nombre de tu base de datos

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$nombre_db", $usuario_db, $contrasena_db);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// ¡¡¡IMPORTANTE!!! Hashear la contraseña antes de guardarla
$contrasena_hasheada = password_hash($contrasena, PASSWORD_DEFAULT);

// Preparar la consulta para insertar el nuevo usuario
$sql = "INSERT INTO usuarios (nombre, email, usuario, password) VALUES (?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);

try {
    $stmt->execute([$nombre, $correo, $usuario, $contrasena_hasheada]);
    // Redirigir al login con un mensaje de éxito
    header("Location: login.php?status=success");
    exit();
} catch (PDOException $e) {
    // Manejar error, por ejemplo, si el usuario ya existe
    header("Location: login.php?status=error");
    exit();
}
?>