<!DOCTYPE html>
<html>
<head>
    <title>Lista de Alumnos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .navbar-fixed {
            margin-bottom: 20px;
        }
        .curso-chip {
            margin: 2px;
        }
        .modal-content {
            padding: 20px;
        }
        .curso-item {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .curso-item:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar-fixed">
        <nav class="blue darken-3">
            <div class="nav-wrapper container">
                <a href="<?= site_url('alumnos') ?>" class="brand-logo">🏫 UMG</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="<?= site_url('alumnos') ?>">👥 Alumnos</a></li>
                    <li><a href="<?= site_url('cursos') ?>">📚 Cursos</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="container" style="margin-top: 80px;">
        <h4>Alumnos</h4>
        <a class="btn waves-effect" href="<?= site_url('alumnos/create') ?>">➕ Nuevo Alumno</a>
        
        <table class="striped highlight responsive-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Cursos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alumnos as $alumno): ?>
                <tr>
                    <td><?= $alumno['alumno'] ?></td>
                    <td><?= $alumno['nombre'] ?></td>
                    <td><?= $alumno['apellido'] ?></td>
                    <td><?= $alumno['telefono'] ?></td>
                    <td><?= $alumno['email'] ?></td>
                    <td>
                        <span class="chip <?= $alumno['inactivo'] ? 'red' : 'green' ?> white-text">
                            <?= $alumno['inactivo'] ? 'Inactivo' : 'Activo' ?>
                        </span>
                    </td>
                    <td>
                        <span class="chip blue white-text">
                            <?= $alumno['total_cursos'] ?> curso(s)
                        </span>
                    </td>
                    <td>
                        <a class="btn-small blue" href="<?= site_url('alumnos/edit/' . $alumno['alumno']) ?>">✏️ Editar</a>
                        <form method="POST" action="<?= site_url('alumnos/delete/' . $alumno['alumno']) ?>" style="display: inline;" onsubmit="return confirm('¿Seguro que quieres eliminar?')">
                            <button type="submit" class="btn-small red">🗑️ Eliminar</button>
                        </form>
                        <a class="btn-small green modal-trigger" href="#modal-asignar-<?= $alumno['alumno'] ?>">📚 Asignar</a>
                        <a class="btn-small orange modal-trigger" href="#modal-ver-<?= $alumno['alumno'] ?>">👁️ Ver Cursos</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modales de Asignación -->
    <?php foreach ($alumnos as $alumno): ?>
    <!-- Modal Asignar Cursos -->
    <div id="modal-asignar-<?= $alumno['alumno'] ?>" class="modal">
        <div class="modal-content">
            <h4>Asignar Cursos a <?= $alumno['nombre'] ?> <?= $alumno['apellido'] ?></h4>
            <div class="row">
                <div class="col s12">
                    <div class="input-field">
                        <select id="curso-select-<?= $alumno['alumno'] ?>">
                            <option value="" disabled selected>Selecciona un curso</option>
                        </select>
                        <label>Curso a asignar</label>
                    </div>
                    <button class="btn waves-effect" onclick="asignarCurso(<?= $alumno['alumno'] ?>)">
                        Asignar Curso
                    </button>
                </div>
            </div>
            <div id="cursos-disponibles-<?= $alumno['alumno'] ?>" class="row">
                <!-- Aquí se cargarán los cursos disponibles -->
            </div>
        </div>
    </div>

    <!-- Modal Ver Cursos Asignados -->
    <div id="modal-ver-<?= $alumno['alumno'] ?>" class="modal">
        <div class="modal-content">
            <h4>Cursos Asignados a <?= $alumno['nombre'] ?> <?= $alumno['apellido'] ?></h4>
            <div id="cursos-asignados-<?= $alumno['alumno'] ?>">
                <?php if (empty($alumno['cursos_asignados'])): ?>
                    <p class="grey-text">No tiene cursos asignados</p>
                <?php else: ?>
                    <?php foreach ($alumno['cursos_asignados'] as $curso): ?>
                    <div class="curso-item">
                        <strong><?= $curso['nombre'] ?></strong> - Profesor: <?= $curso['profesor'] ?>
                        <button class="btn-small red right" onclick="desasignarCurso(<?= $alumno['alumno'] ?>, <?= $curso['curso'] ?>)">
                            Desasignar
                        </button>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar modales
            M.Modal.init(document.querySelectorAll('.modal'));
            
            // Inicializar selects
            M.FormSelect.init(document.querySelectorAll('select'));
            
            // Cargar cursos disponibles para cada modal
            <?php foreach ($alumnos as $alumno): ?>
            cargarCursosDisponibles(<?= $alumno['alumno'] ?>);
            <?php endforeach; ?>
        });

        function cargarCursosDisponibles(alumnoId) {
            fetch(`<?= site_url('asignacion/getCursosDisponibles') ?>/${alumnoId}`)
                .then(response => response.json())
                .then(data => {
                    const select = document.getElementById(`curso-select-${alumnoId}`);
                    const container = document.getElementById(`cursos-disponibles-${alumnoId}`);
                    
                    // Limpiar opciones existentes
                    select.innerHTML = '<option value="" disabled selected>Selecciona un curso</option>';
                    
                    if (data.length > 0) {
                        data.forEach(curso => {
                            const option = document.createElement('option');
                            option.value = curso.curso;
                            option.textContent = `${curso.nombre} - ${curso.profesor}`;
                            select.appendChild(option);
                        });
                        
                        // Reinicializar select
                        M.FormSelect.init(select);
                    } else {
                        container.innerHTML = '<p class="grey-text">No hay cursos disponibles para asignar</p>';
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function asignarCurso(alumnoId) {
            const select = document.getElementById(`curso-select-${alumnoId}`);
            const cursoId = select.value;
            
            if (!cursoId) {
                M.toast({html: 'Selecciona un curso', classes: 'red'});
                return;
            }
            
            const formData = new FormData();
            formData.append('alumno_id', alumnoId);
            formData.append('curso_id', cursoId);
            
            fetch('<?= site_url('asignacion/asignarCurso') ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    M.toast({html: data.message, classes: 'green'});
                    // Recargar la página para actualizar la información
                    setTimeout(() => location.reload(), 1000);
                } else {
                    M.toast({html: data.message, classes: 'red'});
                }
            })
            .catch(error => {
                console.error('Error:', error);
                M.toast({html: 'Error al asignar el curso', classes: 'red'});
            });
        }

        function desasignarCurso(alumnoId, cursoId) {
            if (!confirm('¿Seguro que quieres desasignar este curso?')) {
                return;
            }
            
            const formData = new FormData();
            formData.append('alumno_id', alumnoId);
            formData.append('curso_id', cursoId);
            
            fetch('<?= site_url('asignacion/desasignarCurso') ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    M.toast({html: data.message, classes: 'green'});
                    // Recargar la página para actualizar la información
                    setTimeout(() => location.reload(), 1000);
                } else {
                    M.toast({html: data.message, classes: 'red'});
                }
            })
            .catch(error => {
                console.error('Error:', error);
                M.toast({html: 'Error al desasignar el curso', classes: 'red'});
            });
        }
    </script>
</body>
</html>
