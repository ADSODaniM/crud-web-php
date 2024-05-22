<div id="modalAgregarCita" class="modal" style="display:block;">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal()">&times;</span>
        <h2>Agendar Cita</h2>
        <form id="formulario-cita" method="post" action="index.php">
            <input type="hidden" name="accion" value="agregar_cita">
            <label for="nombre_cliente">Nombre del Cliente:</label><br>
            <input type="text" id="nombre_cliente" name="nombre_cliente" required><br>

            <label for="servicio">Servicio:</label><br>
            <select id="servicio" name="servicio">
                <option value="Manicura">Manicura</option>
                <option value="Pedicura">Pedicura</option>
                </select></br>


            <label for="fecha">Fecha:</label><br>
            <input type="date" id="fecha" name="fecha" required><br>

            <label for="hora">Hora:</label><br>
            <input type="time" id="hora" name="hora" required><br>

            <label for="estado">Estado:</label><br>
            <select id="estado" name="estado" required>
                <option value="Pendiente">Pendiente</option>
                <option value="Confirmada">Confirmada</option>
                <option value="Cancelada">Cancelada</option>
                </select><br>

            <button type="submit">Agendar Cita</button>
        </form>
    </div>
</div>
<script>
    // Función para cerrar el modal
    function cerrarModal() {
        document.getElementById('modalAgregarCita').style.display = 'none';
    }
</script>