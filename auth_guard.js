// auth-guard.js
// Este script va al principio de tus páginas de Administrador

const usuarioActivo = JSON.parse(sessionStorage.getItem('usuarioActivo'));

// 1. Si no hay nadie logueado -> Mandar al login
if (!usuarioActivo) {
    window.location.href = 'login.html';
} 
// 2. Si está logueado, pero NO es admin -> Mandar al inicio (o mostrar error)
else if (usuarioActivo.rol !== 'admin') {
    alert("Acceso denegado: No tienes permisos de administrador.");
    window.location.href = 'index.html';
}

// Si pasa estas dos pruebas, el script no hace nada y deja cargar la página.