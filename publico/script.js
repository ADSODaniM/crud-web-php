function filtrarCitas() {
    var input, filtro, tabla, filas, celdaNombre, celdaServicio, textoNombre, textoServicio;
    input = document.getElementById("inputBusqueda");
    filtro = input.value.toUpperCase();
    tabla = document.getElementById("tablaCitas");
    filas = tabla.getElementsByTagName("tr");

    for (var i = 1; i < filas.length; i++) { // Comienza en 1 para omitir el encabezado
        celdaNombre = filas[i].getElementsByTagName("td")[1]; // Nombre del Cliente
        celdaServicio = filas[i].getElementsByTagName("td")[2]; // Servicio
        if (celdaNombre || celdaServicio) {
            textoNombre = celdaNombre.textContent || celdaNombre.innerText;
            textoServicio = celdaServicio.textContent || celdaServicio.innerText;
            if (textoNombre.toUpperCase().indexOf(filtro) > -1 || textoServicio.toUpperCase().indexOf(filtro) > -1) {
                filas[i].style.display = "";
            } else {
                filas[i].style.display = "none";
            }
        }       
    }
}
