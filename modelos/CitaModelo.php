<?php
// print("Modelo");

class CitaModelo {
    private PDO $conexion;

    public function __construct() {
        global $conexion;
        $this->conexion = $conexion;
    }

    public function obtenerCitas(): array {
        $statement = $this->conexion->query("SELECT * FROM citas");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Modelo para agregar citas en la BD
    public function agregarCita(string $nombre_cliente, string $servicio, string $fecha, string $hora, string $estado): bool {
        try {
            $statement = $this->conexion->prepare("INSERT INTO citas (nombre_cliente, servicio, fecha, hora, estado) VALUES (?, ?, ? ,? ,?)");
            return $statement->execute([$nombre_cliente, $servicio, $fecha, $hora, $estado]);
        } catch (PDOException $e) {
            exit("Error al agregar la cita: " . $e->getMessage());
        }
    }

    // Modelo para consultar UNA cita en la BD por su ID
    public function obtenerCitaPorId(int $id_cita): array {
        $statement = $this->conexion->prepare("SELECT * FROM citas WHERE id = ?");
        $statement->execute([$id_cita]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // Modelo para Actualizar UNA cita en la BD por su ID
    public function actualizarCita(int $id_cita, string $nombre_cliente, string $servicio, string $fecha, string $hora, string $estado): bool {
        try {
            $statement = $this->conexion->prepare("UPDATE citas SET nombre_cliente = ?, servicio = ?, fecha = ?, hora = ?, estado = ? WHERE id = ?");
            return $statement->execute([$nombre_cliente, $servicio, $fecha, $hora, $estado, $id_cita]);
        } catch (PDOException $e) {
            exit("Error al actualizar la cita: " . $e->getMessage());
        }

    }
    
    // Controlador para eliminar cita por su ID
    public function eliminarCita(int $id): bool {
        try {
            $statement = $this->conexion->prepare("DELETE FROM citas WHERE id = ?");
            return $statement->execute([$id]);
        } catch (PDOException $e) {
            exit("Error al eliminar la cita: " . $e->getMessage());
        }
    }
}
?>
