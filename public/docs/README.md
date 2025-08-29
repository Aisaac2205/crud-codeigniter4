# 🏫 Sistema de Gestión de Alumnos y Cursos - CodeIgniter 4

## 📋 Descripción del Proyecto

Este proyecto es un sistema completo de gestión de alumnos y cursos desarrollado en **CodeIgniter 4** con integración de **Materialize CSS** y conexión a **MariaDB/MySQL**.

## ✨ Funcionalidades Implementadas

### 🎯 **CRUD Completo para Alumnos**
- ✅ **Crear** nuevos alumnos
- ✅ **Listar** todos los alumnos
- ✅ **Editar** información de alumnos
- ✅ **Eliminar** alumnos
- ✅ **Estado** activo/inactivo

### 🎯 **CRUD Completo para Cursos**
- ✅ **Crear** nuevos cursos
- ✅ **Listar** todos los cursos
- ✅ **Editar** información de cursos
- ✅ **Eliminar** cursos
- ✅ **Estado** activo/inactivo

### 🎯 **Sistema de Asignación de Cursos**
- ✅ **Asignar** cursos a alumnos
- ✅ **Desasignar** cursos de alumnos
- ✅ **Ver** cursos asignados por alumno
- ✅ **Indicadores visuales** de asignaciones

### 🎯 **Interfaz de Usuario**
- ✅ **Navbar** de navegación
- ✅ **Modales** para asignaciones
- ✅ **Diseño responsive** con Materialize CSS
- ✅ **Iconos** y elementos visuales

## 🏗️ Arquitectura del Sistema

### **Estructura de Base de Datos**

```sql
-- Tabla: alumnos
CREATE TABLE `alumnos` (
  `alumno` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `movil` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fecha_creacion` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `inactivo` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`alumno`)
);

-- Tabla: cursos
CREATE TABLE `cursos` (
  `curso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `profesor` varchar(100) DEFAULT NULL,
  `inactivo` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`curso`)
);

-- Tabla: detalle_alumno_curso (Relación N:N)
CREATE TABLE `detalle_alumno_curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `fecha_asignacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`alumno`),
  FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`curso`)
);
```

### **Estructura de Archivos**

```
crud-codeigniter4/
├── app/
│   ├── Controllers/
│   │   ├── AlumnoController.php      # CRUD de alumnos
│   │   ├── CursoController.php       # CRUD de cursos
│   │   ├── AsignacionController.php  # Gestión de asignaciones
│   │   └── BaseController.php        # Controlador base
│   ├── Models/
│   │   ├── AlumnoModel.php           # Modelo de alumnos
│   │   ├── CursoModel.php            # Modelo de cursos
│   │   └── DetalleAlumnoCursoModel.php # Modelo de asignaciones
│   ├── Views/
│   │   ├── alumnos/
│   │   │   ├── index.php             # Lista de alumnos
│   │   │   ├── create.php            # Crear alumno
│   │   │   └── edit.php              # Editar alumno
│   │   └── cursos/
│   │       ├── index.php             # Lista de cursos
│   │       ├── create.php            # Crear curso
│   │       └── edit.php              # Editar curso
│   └── Config/
│       ├── Routes.php                 # Configuración de rutas
│       ├── Database.php               # Configuración de BD
│       └── App.php                    # Configuración general
├── public/
│   ├── index.php                      # Punto de entrada
│   └── docs/                          # Documentación
├── system/                            # Framework CodeIgniter 4
├── script.sql                         # Script de base de datos
└── env                                # Variables de entorno
```

## 🚀 Instalación y Configuración

### **Requisitos Previos**
- PHP 8.1 o superior
- MariaDB/MySQL
- Servidor web (Apache/Nginx)

### **Pasos de Instalación**

1. **Clonar el proyecto**
   ```bash
   git clone [URL_DEL_REPOSITORIO]
   cd crud-codeigniter4
   ```

2. **Configurar la base de datos**
   - Crear base de datos `umg`
   - Ejecutar el script `script.sql`
   - Configurar credenciales en `app/Config/Database.php`

3. **Configurar variables de entorno**
   - Copiar `env` a `.env`
   - Ajustar configuración según tu entorno

4. **Configurar el servidor web**
   - Apuntar el document root a la carpeta `public/`
   - Configurar URL rewriting si es necesario

### **Configuración de Base de Datos**

Editar `app/Config/Database.php`:

```php
public array $default = [
    'hostname' => '127.0.0.1',
    'username' => 'tu_usuario',
    'password' => 'tu_password',
    'database' => 'umg',
    'DBDriver' => 'MySQLi',
    'DBPrefix' => '',
    'pConnect' => false,
    'DBDebug'  => true,
    'charset'  => 'utf8mb4',
    'DBCollat' => 'utf8mb4_general_ci',
    'port'     => 3306,
];
```

## 📱 Uso del Sistema

### **Navegación Principal**
- **🏫 UMG**: Logo principal que lleva a la página de alumnos
- **👥 Alumnos**: Acceso a la gestión de alumnos
- **📚 Cursos**: Acceso a la gestión de cursos

### **Gestión de Alumnos**
1. **Ver Alumnos**: Lista todos los alumnos con sus cursos asignados
2. **Nuevo Alumno**: Formulario para crear nuevos alumnos
3. **Editar**: Modificar información de alumnos existentes
4. **Eliminar**: Remover alumnos del sistema
5. **📚 Asignar**: Modal para asignar cursos a alumnos
6. **👁️ Ver Cursos**: Modal para ver cursos asignados

### **Gestión de Cursos**
1. **Ver Cursos**: Lista todos los cursos disponibles
2. **Nuevo Curso**: Formulario para crear nuevos cursos
3. **Editar**: Modificar información de cursos existentes
4. **Eliminar**: Remover cursos del sistema

### **Asignación de Cursos**
1. **Asignar Curso**: Seleccionar curso disponible y asignarlo
2. **Ver Cursos Asignados**: Lista de cursos ya asignados
3. **Desasignar**: Remover cursos de alumnos específicos

## 🔧 Características Técnicas

### **Framework y Tecnologías**
- **Backend**: CodeIgniter 4 (PHP 8.1+)
- **Frontend**: Materialize CSS + JavaScript vanilla
- **Base de Datos**: MariaDB/MySQL
- **Arquitectura**: MVC (Model-View-Controller)

### **Características del Código**
- **PSR-4 Autoloading**: Estándar de autoloading de PHP
- **Validación**: Validación de formularios HTML5 y del lado servidor
- **Seguridad**: Protección CSRF, validación de entrada
- **Responsive**: Diseño adaptable a diferentes dispositivos

### **Funcionalidades Avanzadas**
- **Relaciones N:N**: Sistema de asignación múltiple de cursos
- **Modales Dinámicos**: Interfaz moderna con Materialize
- **AJAX**: Comunicación asíncrona para asignaciones
- **Indicadores Visuales**: Chips y badges informativos

## 📊 Diagrama de Base de Datos

```
┌─────────────┐    ┌──────────────────────┐    ┌─────────────┐
│   alumnos   │    │ detalle_alumno_curso │    │   cursos    │
├─────────────┤    ├──────────────────────┤    ├─────────────┤
│ alumno (PK) │◄───┤ alumno_id (FK)      │    │ curso (PK)  │
│ nombre      │    │ curso_id (FK)        │◄───┤ nombre      │
│ apellido    │    │ fecha_asignacion     │    │ profesor    │
│ direccion   │    │ activo               │    │ inactivo    │
│ movil       │    └──────────────────────┘    └─────────────┘
│ email       │
│ fecha_creacion│
│ user        │
│ inactivo    │
└─────────────┘
```

## 🎨 Personalización y Estilos

### **Colores del Sistema**
- **Primario**: Blue darken-3 (Navbar)
- **Éxito**: Green (Estados activos)
- **Error**: Red (Estados inactivos, eliminación)
- **Información**: Blue (Chips de cursos)
- **Advertencia**: Orange (Ver cursos)

### **Componentes Materialize**
- **Navbar**: Navegación principal fija
- **Modales**: Ventanas emergentes para asignaciones
- **Chips**: Indicadores de estado y cantidad
- **Botones**: Acciones principales y secundarias
- **Tablas**: Listados responsivos con Materialize

## 🚨 Consideraciones de Seguridad

- **Validación de Entrada**: Todos los formularios validan datos
- **Protección CSRF**: Tokens de seguridad en formularios
- **Sanitización**: Limpieza de datos antes de procesar
- **Control de Acceso**: Validación de permisos (básica)

## 🔮 Mejoras Futuras

- **Autenticación**: Sistema de login y roles de usuario
- **Auditoría**: Logs de cambios y acciones
- **Reportes**: Generación de reportes PDF/Excel
- **API REST**: Endpoints para integración externa
- **Notificaciones**: Sistema de alertas y recordatorios

## 📞 Soporte y Contacto

Para soporte técnico o consultas sobre el proyecto:
- **Repositorio**: [URL_DEL_REPOSITORIO]
- **Documentación**: Este archivo README
- **Issues**: Reportar problemas en el repositorio

---

**Desarrollado con ❤️ usando CodeIgniter 4 y Materialize CSS**
