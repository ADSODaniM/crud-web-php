<div id="modalActualizarCita" class="modal" style="display:block;">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal()">&times;</span>
        <h2>Actualizar Cita</h2>
        <form action="index.php?accion=actualizar_cita" method="POST">
            <input type="hidden" name="accion" value="actualizar_cita">
            <input type="hidden" name="id_cita" value="<?= htmlspecialchars($cita['id']) ?>">

            <label for="nombre">Nombre del Cliente:</label><br>
            <input type="text" id="nombre_cliente" name="nombre_cliente" value="<?= htmlspecialchars($cita['nombre_cliente']) ?>" required><br>

            <label for="servicio">Servicio:</label><br>
            <select id="servicio" name="servicio" required>
                <option value="Manicura" <?= $cita['servicio'] == 'manicura' ? 'selected' : '' ?>>Manicura</option>
                <option value="Pedicura" <?= $cita['servicio'] == 'pedicura' ? 'selected' : '' ?>>Pedicura</option>
            </select><br>

            <label for="fecha">Fecha:</label><br>
            <input type="date" id="fecha" name="fecha" value="<?= htmlspecialchars($cita['fecha']) ?>" required><br><br>

            <label for="hora">Hora:</label><br>
            <input type="time" id="hora" name="hora" value="<?= htmlspecialchars($cita['hora']) ?>" required><br><br>

            <label for="estado">Estado:</label><br>
            <select id="estado" name="estado" required>
                <option value="Pendiente" <?= $cita['estado'] == 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                <option value="Confirmada" <?= $cita['estado'] == 'confirmada' ? 'selected' : '' ?>>Confirmada</option>
                <option value="Cancelada" <?= $cita['estado'] == 'cancelada' ? 'selected' : '' ?>>Cancelada</option>
            </select><br>

            <button type="submit">Actualizar</button>
        </form>
    </div>
</div>

<script>
    // Función para cerrar el modal
    function cerrarModal() {
        document.getElementById('modalActualizarCita').style.display = 'none';
    }
</script>
