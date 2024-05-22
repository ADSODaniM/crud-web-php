<!-- Archivo: Vistas/citaview.php -->
<!-- Propósito: Vista para mostrar la lista de citas -->

<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Citas</title>
</head>
<body>
    <h3>CRUD de Citas💅🏼 Nail Salón</h3>
    <a href="index.php?accion=modalAdd">Agregar Cita ✍🏼💅🏼✨</a>
    <input type="text" id="inputBusqueda" placeholder="Buscar por nombre o servicio" onkeyup="filtrarCitas()">

        <!-- Configurar la zona horaria -->
        <?php date_default_timezone_set('America/Bogota'); ?>

    <table class="table" border="1" id="tablaCitas">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Cliente</th>
                <th>Servicio</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($citas as $cita): ?>
                <tr>
                <td><?= htmlspecialchars($cita['id']) ?></td>
                    <td><?= htmlspecialchars($cita['nombre_cliente']) ?></td>
                    <td><?= htmlspecialchars($cita['servicio']) ?></td>
                    <td><?= htmlspecialchars($cita['fecha']) ?></td>
                    <td><?= date('h:i A', strtotime($cita['hora'])) ?></td>
                    <td><?= htmlspecialchars($cita['estado']) ?></td>
                    <td>
                    <a href="index.php?accion=modalActualizar&id_cita=<?= htmlspecialchars($cita['id']) ?>">📝</a>
                    <a href="index.php?accion=eliminarCita&id=<?= $cita['id'] ?>">🚮</a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="./Publico/script.js"></script>

</body>
</html>