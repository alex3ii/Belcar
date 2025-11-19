// seguridad-admin.js

// 1. Leemos la sesión actual
const usuarioActivoTexto = sessionStorage.getItem('usuarioActivo');

// 2. Primera verificación: ¿Existe un usuario logueado?
if (!usuarioActivoTexto) {
    alert("Debes iniciar sesión para acceder a esta página.");
    window.location.href = 'login.html';
} else {
    // Convertimos el texto a objeto
    const usuarioActivo = JSON.parse(usuarioActivoTexto);

    // 3. Segunda verificación: ¿Es administrador?
    // OJO: Asegúrate de que en tus datos el rol esté escrito exactamente como 'administrador'
    if (usuarioActivo.rol !== 'administrador') {
        alert("Acceso denegado. No tienes permisos de administrador.");
        window.location.href = 'index.html'; // Lo mandamos a la página de clientes
    } else {
        // ¡Si llega aquí, es bienvenido! 
        console.log("Acceso autorizado para el admin: " + usuarioActivo.nombre);
    }
}

// 4. Función para CERRAR SESIÓN (La usaremos en el botón de salir)
function cerrarSesion() {
    sessionStorage.removeItem('usuarioActivo'); // Borramos el "gafete"
    window.location.href = 'login.html'; // Lo mandamos al login
}