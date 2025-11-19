document.addEventListener("DOMContentLoaded", () => {
    
    // Esto ahora SÍ va a encontrar el elemento <form id="login-form">
    const loginForm = document.getElementById("login-form");

    loginForm.addEventListener("submit", (event) => {
        event.preventDefault();

        const correoIngresado = document.getElementById("correo").value.trim(); 
        const passwordIngresado = document.getElementById("contrasena").value.trim();

        if(correoIngresado === "" || passwordIngresado === "") {
            alert("Por favor, completa todos los campos.");
            return;
        }

        const usuariosGuardados = localStorage.getItem('cuentas');

        if (!usuariosGuardados) {
            alert("No hay usuarios registrados.");
            return;
        }

        const listaUsuarios = JSON.parse(usuariosGuardados);

        // Búsqueda
        const usuarioEncontrado = listaUsuarios.find(usuario => {
            // Compara CORREO con CORREO y CONTRASEÑA con CONTRASEÑA
            return usuario.correo === correoIngresado && usuario.contrasena === passwordIngresado;
        });

        if (usuarioEncontrado) {
            // Guardar sesión
            sessionStorage.setItem('usuarioActivo', JSON.stringify(usuarioEncontrado));
            alert(`¡Bienvenido, ${usuarioEncontrado.nombre}!`);

            // Redirección
            if (usuarioEncontrado.rol === 'administrador' || usuarioEncontrado.rol === 'admin') {
                window.location.href = 'admin.html'; 
            } else {
                window.location.href = 'index.html'; 
            }
        } else {
            alert("Correo o contraseña incorrectos.");
        }
    });
});