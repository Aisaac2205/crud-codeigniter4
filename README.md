# 🏫 Sistema CRUD de Gestión Académica - CodeIgniter 4

Sistema completo de gestión de alumnos y cursos desarrollado en CodeIgniter 4 con funcionalidades CRUD, asignación de cursos y navegación intuitiva.

## ✨ Características del Proyecto

- ✅ **CRUD completo para Alumnos** (Crear, Leer, Actualizar, Eliminar)
- ✅ **CRUD completo para Cursos** (Crear, Leer, Actualizar, Eliminar)
- ✅ **Sistema de Asignación** de cursos a alumnos
- ✅ **Navegación intuitiva** con navbar responsive
- ✅ **Interfaz moderna** con Materialize CSS
- ✅ **Validaciones** en frontend y backend
- ✅ **Base de datos relacional** con 3 tablas
- ✅ **Sistema de estados** activo/inactivo

## 🗄️ Estructura de la Base de Datos

El proyecto incluye 3 tablas principales:

1. **`alumnos`** - Información de estudiantes
2. **`cursos`** - Información de materias
3. **`detalle_alumno_curso`** - Relación N:M entre alumnos y cursos

## 🚀 Instalación y Configuración

### Requisitos Previos

- **XAMPP** (Apache + MariaDB/MySQL + PHP)
- **PHP 7.4+** o **PHP 8.0+**
- **MariaDB 10.2+** o **MySQL 5.7+**
- **Composer** (para dependencias)

### Paso 1: Clonar el Repositorio

```bash
git clone https://github.com/Aisaac2205/crud-codeigniter4
cd crud-codeigniter4
```

### Paso 2: Configurar la Base de Datos

1. **Abrir XAMPP Control Panel** y iniciar Apache y MariaDB
2. **Abrir phpMyAdmin** en `http://localhost/phpmyadmin`
3. **Crear nueva base de datos** llamada `umg`
4. **Importar el archivo** `script.sql` que está en la raíz del proyecto

### Paso 3: Configurar Credenciales

1. **Copiar el archivo de ejemplo:**
   ```bash
   cp app/Config/Database.example.php app/Config/Database.php
   ```

2. **Editar** `app/Config/Database.php` y cambiar:
   - `TU_USUARIO_MARIADB` por tu usuario de MariaDB
   - `TU_PASSWORD_MARIADB` por tu contraseña de MariaDB

3. **O crear archivo `.env`** en la raíz del proyecto:
   ```env
   database.default.username = tu_usuario
   database.default.password = tu_password
   database.default.database = umg
   ```

### Paso 4: Instalar Dependencias

```bash
composer install
```

### Paso 5: Configurar Permisos

```bash
# En Windows (XAMPP)
# Asegúrate de que la carpeta writable/ tenga permisos de escritura

# En Linux/Mac
chmod -R 755 writable/
```

## 🌐 Acceso a la Aplicación

### URL Principal
```
http://localhost/crud-codeigniter4/public/
```

### Rutas Principales
- **Alumnos:** `http://localhost/crud-codeigniter4/public/alumnos`
- **Cursos:** `http://localhost/crud-codeigniter4/public/cursos`
- **Crear Alumno:** `http://localhost/crud-codeigniter4/public/alumnos/create`
- **Crear Curso:** `http://localhost/crud-codeigniter4/public/cursos/create`

## 📱 Funcionalidades del Sistema

### 👥 Gestión de Alumnos
- **Listar** todos los alumnos con información completa
- **Crear** nuevos alumnos con validaciones
- **Editar** información existente
- **Eliminar** alumnos (con confirmación)
- **Ver cursos asignados** a cada alumno

### 📚 Gestión de Cursos
- **Listar** todos los cursos disponibles
- **Crear** nuevos cursos con profesor
- **Editar** información de cursos
- **Eliminar** cursos (con confirmación)
- **Gestionar estado** activo/inactivo

### 🔗 Asignación de Cursos
- **Asignar cursos** a alumnos mediante modal
- **Ver cursos asignados** por alumno
- **Desasignar cursos** desde la vista de alumno
- **Indicadores visuales** de asignaciones

## 🛠️ Estructura del Proyecto

```
crud-codeigniter4/
├── app/
│   ├── Controllers/          # Controladores de la aplicación
│   ├── Models/               # Modelos de datos
│   ├── Views/                # Vistas de la interfaz
│   └── Config/               # Configuraciones
├── public/                   # Archivos públicos
├── system/                   # Core de CodeIgniter 4
├── writable/                 # Archivos temporales
├── script.sql               # Script de base de datos
└── README.md                # Este archivo
```

## 🔧 Archivos Importantes

### Controladores
- **`AlumnoController.php`** - Gestión de alumnos
- **`CursoController.php`** - Gestión de cursos  
- **`AsignacionController.php`** - Gestión de asignaciones

### Modelos
- **`AlumnoModel.php`** - Operaciones de alumnos
- **`CursoModel.php`** - Operaciones de cursos
- **`DetalleAlumnoCursoModel.php`** - Relaciones N:M

### Vistas
- **`alumnos/index.php`** - Listado principal de alumnos
- **`cursos/index.php`** - Listado principal de cursos
- **`cursos/create.php`** - Formulario de creación
- **`cursos/edit.php`** - Formulario de edición

## 🎨 Tecnologías Utilizadas

- **Backend:** CodeIgniter 4 (PHP)
- **Frontend:** HTML5, CSS3, JavaScript
- **Framework CSS:** Materialize CSS
- **Base de Datos:** MariaDB/MySQL
- **Servidor:** Apache (XAMPP)

## 📋 Cómo Usar el Sistema

### 1. Navegación
- Usa el **navbar azul** para moverte entre Alumnos y Cursos
- El **logo UMG** te lleva a la página principal

### 2. Gestión de Alumnos
- **Ver lista:** Navega a "👥 Alumnos"
- **Agregar:** Click en "➕ Nuevo Alumno"
- **Editar:** Click en "✏️ Editar"
- **Eliminar:** Click en "🗑️ Eliminar"
- **Asignar cursos:** Click en "📚 Asignar"
- **Ver cursos:** Click en "👁️ Ver Cursos"

### 3. Gestión de Cursos
- **Ver lista:** Navega a "📚 Cursos"
- **Agregar:** Click en "➕ Nuevo Curso"
- **Editar:** Click en "✏️ Editar"
- **Eliminar:** Click en "🗑️ Eliminar"

### 4. Asignación de Cursos
- **Desde la lista de alumnos:**
  1. Click en "📚 Asignar" de cualquier alumno
  2. Selecciona el curso del dropdown
  3. Click en "Asignar Curso"
- **Para ver cursos asignados:**
  1. Click en "👁️ Ver Cursos"
  2. Verás todos los cursos del alumno
  3. Puedes desasignar con "Desasignar"

## 🚨 Solución de Problemas

### Error de Conexión a BD
- Verifica que MariaDB esté corriendo en XAMPP
- Confirma credenciales en `Database.php`
- Asegúrate de que la BD `umg` exista

### Página no carga
- Verifica que Apache esté corriendo
- Confirma la URL: `http://localhost/crud-codeigniter4/public/`
- Revisa los logs en `writable/logs/`

### Errores de permisos
- En Windows: Ejecuta XAMPP como administrador
- En Linux/Mac: `chmod -R 755 writable/`

## 📸 Capturas de Pantalla

### Funcionalidades Implementadas
- ✅ CRUD completo de Cursos
- ✅ Sistema de asignación de cursos
- ✅ Navegación entre secciones
- ✅ Modales para asignación y visualización
- ✅ Indicadores visuales de estado

## 🤝 Contribución

Este proyecto fue desarrollado como tarea académica. Si encuentras errores o quieres mejorar algo:

1. Haz un **Fork** del repositorio
2. Crea una **rama** para tu feature
3. Haz **commit** de tus cambios
4. Crea un **Pull Request**

## 📄 Licencia

Este proyecto es de uso educativo. Libre para uso académico y personal.

## 👨‍💻 Autor

Desarrollado como proyecto académico para demostrar habilidades en:
- CodeIgniter 4
- PHP
- Base de datos relacional
- Frontend responsive
- CRUD completo

### Para personalizar:
- Edita `app/Config/Database.php` con tus credenciales
- Modifica `script.sql` si quieres otros datos de ejemplo
- Cambia colores en las vistas CSS

