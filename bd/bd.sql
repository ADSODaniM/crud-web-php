-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS `nailsalon`;

-- Usar la base de datos
USE `nailsalon`;

CREATE TABLE IF NOT EXISTS `citas` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nombre_cliente` VARCHAR(255) NOT NULL,
  `servicio` VARCHAR(255) NOT NULL,
  `fecha` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `estado` VARCHAR(50) NOT NULL
);

-- Insertar datos de ejemplo (opcional)
INSERT INTO `citas` (`nombre_cliente`, `servicio`, `fecha`, `hora`, `estado`) VALUES
('María Pérez', 'Pedicura', '2024-05-20', '10:00:00', 'Pendiente'),
('Juana López', 'Manicura', '2024-05-22', '2:00:00', 'Confirmada'),
('Ana Triana', 'Pedicura', '2024-05-25', '4:00:00', 'Cancelada');