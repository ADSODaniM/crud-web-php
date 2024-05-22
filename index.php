<link rel="stylesheet" href="publico/estilosA.css">

<?php

require_once 'configuracion/conexion.php'; 

require_once 'controladores/CitaControlador.php';

$controladorCita = new CitaControlador();


// Acciones GET
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $accion = $_GET['accion'] ?? '';

    switch ($accion) {
        case 'modalAdd':
            include './vistas/modaladdcita.php';
            break;

        case 'modalActualizar':
            if (isset($_GET['id_cita'])) {
                $controladorCita->mostrarFormularioActualizarCita((int)$_GET['id_cita']); 
            } else {
                echo "ID de cita no válido.";
            }
            break;

            case 'eliminarCita':
                if (isset($_GET['id'])) {
                    $controladorCita->eliminarCita($_GET['id']);
                }
                break;

    }

    $controladorCita->mostrarCitas();
}

// Acciones POST
elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    $accion = $_POST['accion'] ?? '';

    switch ($accion) {
        case 'agregar_cita':
            $controladorCita->agregarCita();
            break;

        case 'actualizar_cita':
                $controladorCita->actualizarCita();
                $id_cita = intval($_POST['id_cita']);
                $nombre_cliente = $_POST['nombre_cliente'];
                $servicio = $_POST['servicio'];
                $fecha = $_POST['fecha'];
                $hora = $_POST['hora'];
                $estado = $_POST['estado'];
                $controladorCita->actualizarCita($id_cita, $nombre_cliente, $servicio, $fecha, $hora, $estado);
                break;
            

    }


    header("Location: index.php");
    exit();
}

// Redireccionamiento por defecto
else {
    header("Location: index.php");
    exit();
}

?>