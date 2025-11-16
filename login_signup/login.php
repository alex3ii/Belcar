<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso</title>
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
<div class="container">
    <form id="loginForm" action="procesar_login.php" method="POST">
        <h2>Iniciar Sesión</h2>
        <input type="text" name="usuario" placeholder="Nombre de usuario" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <button type="submit">Entrar</button>
        <div class="toggle" onclick="mostrarRegistro()">¿No tienes cuenta? Crear cuenta</div>
    </form>

    <form id="registroForm" class="hidden" action="procesar_registro.php" method="POST">
        <h2>Crear Cuenta</h2>
        <input type="text" name="nombre" placeholder="Nombre completo" required>
        <input type="email" name="correo" placeholder="Correo electrónico" required>
        <input type="text" name="usuario" placeholder="Nombre de usuario" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <button type="submit">Registrarse</button>
        <div class="toggle" onclick="mostrarLogin()">¿Ya tienes cuenta? Iniciar sesión</div>
    </form>
</div>

<script>
    function mostrarRegistro() {
        document.getElementById("loginForm").classList.add("hidden");
        document.getElementById("registroForm").classList.remove("hidden");
    }

    function mostrarLogin() {
        document.getElementById("registroForm").classList.add("hidden");
        document.getElementById("loginForm").classList.remove("hidden");
    }
</script>
</body>
</html><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso - Arkham City</title>
    <style> /* ... Tu CSS de antes ... */ </style>
</head>
<body>
<div class="container">
    <form id="loginForm" action="procesar_login.php" method="POST">
        <h2>Iniciar Sesión</h2>
        <input type="text" name="usuario" placeholder="Nombre de usuario" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <button type="submit">Entrar</button>
        <div class="toggle" onclick="mostrarRegistro()">¿No tienes cuenta? Crear cuenta</div>
    </form>

    <form id="registroForm" class="hidden" action="procesar_registro.php" method="POST">
        <h2>Crear Cuenta</h2>
        <input type="text" name="nombre" placeholder="Nombre completo" required>
        <input type="email" name="correo" placeholder="Correo electrónico" required>
        <input type="text" name="usuario" placeholder="Nombre de usuario" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <button type="submit">Registrarse</button>
        <div class="toggle" onclick="mostrarLogin()">¿Ya tienes cuenta? Iniciar sesión</div>
    </form>
</div>

<script>
    function mostrarRegistro() {
        document.getElementById("loginForm").classList.add("hidden");
        document.getElementById("registroForm").classList.remove("hidden");
    }

    function mostrarLogin() {
        document.getElementById("registroForm").classList.add("hidden");
        document.getElementById("loginForm").classList.remove("hidden");
    }
</script>
</body>
</html>