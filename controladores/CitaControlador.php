<?php
// print("<br>Controlador<br>");

require_once './modelos/CitaModelo.php';

class CitaControlador {
    private CitaModelo $modeloCita;

    public function __construct() {
        $this->modeloCita = new CitaModelo();
    }

    // Controlador para Mostrar Citas
    public function mostrarCitas() {
        $citas = $this->modeloCita->obtenerCitas();
        include './vistas/citas_view.php';
    }

    // Controlador para Agregar Cita
    public function agregarCita(): void {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nombre_cliente = $_POST['nombre_cliente'];
            $servicio = $_POST['servicio'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $estado = $_POST['estado'];
            $exito = $this->modeloCita->agregarCita($nombre_cliente, $servicio, $fecha, $hora, $estado);
            if ($exito) {
                header("Location: index.php");
                exit();
            } else {
                exit("Error al agendar la cita");
            }
        }
    }

    // Controlador para Mostrar formulario, con una cita por su ID
    public function mostrarFormularioActualizarCita(int $id_cita): void {
        $cita = $this->modeloCita->obtenerCitaPorId($id_cita);
        include './vistas/modalactualizarcita.php';
    }

    // Controlador para Actualizar Cita por su ID
    public function actualizarCita(): void {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id_cita = $_POST['id_cita'];
            $nombre_cliente = $_POST['nombre_cliente'];
            $servicio = $_POST['servicio'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $estado = $_POST['estado'];
            $exito = $this->modeloCita->actualizarCita($id_cita, $nombre_cliente, $servicio, $fecha, $hora, $estado);
            if ($exito) {
                header("Location: index.php");
                exit();
            } else {
                exit("Error al actualizar la cita");
            }
        }
    }


    // Controlador para eliminar cita por su ID
    public function eliminarCita(int $id): void {
        $exito = $this->modeloCita->eliminarCita($id);
            if ($exito) {
                header("Location: index.php");
                exit();
            } else {
                exit("Error al eliminar la cita");
            }
    }
}
?>
