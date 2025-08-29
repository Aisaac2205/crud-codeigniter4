<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Curso</title>
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
        <h4>Agregar Curso</h4>
        <form method="post" action="<?= site_url('cursos/store') ?>">
            <div class="input-field">
                <input type="text" id="nombre" name="nombre" required>
                <label for="nombre">Nombre del Curso</label>
            </div>
            <div class="input-field">
                <input type="text" id="profesor" name="profesor" required>
                <label for="profesor">Profesor</label>
            </div>
            <div class="input-field">
                <select name="inactivo" id="inactivo">
                    <option value="0">Activo</option>
                    <option value="1">Inactivo</option>
                </select>
                <label>Estado</label>
            </div>
            <button class="btn waves-effect" type="submit">Guardar</button>
            <a class="btn-flat" href="<?= site_url('cursos') ?>">⬅️ Volver</a>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() { 
            M.updateTextFields();
            M.FormSelect.init(document.querySelectorAll('select'));
        });
    </script>
</body>
</html>
