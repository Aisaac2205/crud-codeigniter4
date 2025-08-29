-- Script SQL para el proyecto CRUD CodeIgniter 4
-- Base de datos: umg

-- Crear base de datos si no existe
CREATE DATABASE IF NOT EXISTS `umg` 
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `umg`;

-- Tabla de Alumnos
CREATE TABLE IF NOT EXISTS `alumnos` (
  `alumno` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `inactivo` tinyint(1) DEFAULT 0,
  `fecha_creacion` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`alumno`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla de Cursos
CREATE TABLE IF NOT EXISTS `cursos` (
  `curso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `profesor` varchar(100) NOT NULL,
  `inactivo` tinyint(1) DEFAULT 0,
  `fecha_creacion` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabla de relación muchos a muchos entre Alumnos y Cursos
CREATE TABLE IF NOT EXISTS `detalle_alumno_curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `fecha_asignacion` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alumno_curso_unique` (`alumno_id`, `curso_id`),
  FOREIGN KEY (`alumno_id`) REFERENCES `alumnos`(`alumno`) ON DELETE CASCADE,
  FOREIGN KEY (`curso_id`) REFERENCES `cursos`(`curso`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insertar datos de ejemplo para Alumnos
INSERT INTO `alumnos` (`nombre`, `apellido`, `email`, `telefono`, `inactivo`) VALUES
('Juan', 'Pérez', 'juan.perez@email.com', '502-1234-5678', 0),
('María', 'García', 'maria.garcia@email.com', '502-2345-6789', 0),
('Carlos', 'López', 'carlos.lopez@email.com', '502-3456-7890', 0),
('Ana', 'Martínez', 'ana.martinez@email.com', '502-4567-8901', 0),
('Luis', 'Rodríguez', 'luis.rodriguez@email.com', '502-5678-9012', 0);

-- Insertar datos de ejemplo para Cursos
INSERT INTO `cursos` (`nombre`, `profesor`, `inactivo`) VALUES
('Matemáticas Avanzadas', 'Dr. Roberto Silva', 0),
('Programación Web', 'Ing. Patricia Morales', 0),
('Base de Datos', 'MSc. Fernando Torres', 0),
('Inglés Técnico', 'Lic. Carmen Ruiz', 0),
('Estadística', 'Dr. Alejandro Vega', 0);

-- Insertar algunas asignaciones de ejemplo
INSERT INTO `detalle_alumno_curso` (`alumno_id`, `curso_id`) VALUES
(1, 1), -- Juan Pérez en Matemáticas
(1, 2), -- Juan Pérez en Programación Web
(2, 2), -- María García en Programación Web
(2, 3), -- María García en Base de Datos
(3, 1), -- Carlos López en Matemáticas
(4, 4), -- Ana Martínez en Inglés Técnico
(5, 5); -- Luis Rodríguez en Estadística