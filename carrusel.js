const imagenes = [
    "imagenes/Lego_Dunk.PNG",
    "imagenes/Lego_Dunk2.PNG",
];

let indiceActual = 0;

function cambiarImagen(direccion) {
    indiceActual += direccion;
    if (indiceActual < 0) {
        indiceActual = imagenes.length - 1;
    } else if (indiceActual >= imagenes.length) {
        indiceActual = 0;
    }
    document.getElementById("imagenCarrusel").src = imagenes[indiceActual];
}
