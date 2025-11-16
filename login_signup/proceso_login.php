<?php
session_start(); // Iniciar la sesión para guardar datos del usuario

// Conexión a la base de datos (igual que en el registro)
$servidor = "localhost";
$usuario_db = "root";
$contrasena_db = "";
$nombre_db = "belcar";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$nombre_db", $usuario_db, $contrasena_db);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}

// Recibir datos del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Buscar al usuario en la base de datos
$sql = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->execute([$usuario]);

$usuario_encontrado = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si el usuario existe y si la contraseña es correcta
if ($usuario_encontrado && password_verify($contrasena, $usuario_encontrado['password'])) {
    
    // El login es correcto, guardamos sus datos en la sesión
    $_SESSION['usuario_id'] = $usuario_encontrado['id'];
    $_SESSION['usuario_rol'] = $usuario_encontrado['rol'];

    // LA LÓGICA CLAVE: Redirigir según el rol
    if ($usuario_encontrado['rol'] === 'administrador') {
        header("Location: dashboard_admin.php"); // Página para administradores
        exit();
    } else {
        header("Location: dashboard_cliente.php"); // Página para clientes
        exit();
    }

} else {
    // Si el login falla, redirigir de vuelta con un error
    header("Location: login.php?status=login_error");
    exit();
}
?>