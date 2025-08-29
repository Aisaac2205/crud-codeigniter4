<!DOCTYPE html>
<html>
<head>
    <title>Lista de Cursos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .navbar-fixed {
            margin-bottom: 20px;
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
        <h4>Cursos</h4>
        <a class="btn waves-effect" href="<?= site_url('cursos/create') ?>">➕ Nuevo Curso</a>
        <a class="btn-flat waves-effect" href="<?= site_url('alumnos') ?>">👥 Ver Alumnos</a>
        
        <table class="striped highlight responsive-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Profesor</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cursos as $curso): ?>
                <tr>
                    <td><?= $curso['curso'] ?></td>
                    <td><?= $curso['nombre'] ?></td>
                    <td><?= $curso['profesor'] ?></td>
                    <td>
                        <span class="chip <?= $curso['inactivo'] ? 'red' : 'green' ?> white-text">
                            <?= $curso['inactivo'] ? 'Inactivo' : 'Activo' ?>
                        </span>
                    </td>
                    <td>
                        <a class="btn-small blue" href="<?= site_url('cursos/edit/' . $curso['curso']) ?>">✏️ Editar</a>
                        <form method="POST" action="<?= site_url('cursos/delete/' . $curso['curso']) ?>" style="display: inline;" onsubmit="return confirm('¿Seguro que quieres eliminar este curso?')">
                            <button type="submit" class="btn-small red">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
