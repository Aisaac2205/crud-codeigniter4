<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Alumno</title>
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
        <h4>Agregar Alumno</h4>
        <form method="post" action="<?= site_url('alumnos/store') ?>">
            <div class="input-field">
                <input type="text" id="nombre" name="nombre" required>
                <label for="nombre">Nombre</label>
            </div>
            <div class="input-field">
                <input type="text" id="apellido" name="apellido" required>
                <label for="apellido">Apellido</label>
            </div>
            <div class="input-field">
                <input type="text" id="telefono" name="telefono">
                <label for="telefono">Teléfono</label>
            </div>
            <div class="input-field">
                <input type="email" id="email" name="email" required>
                <label for="email">Email</label>
            </div>
            <button class="btn waves-effect" type="submit">Guardar</button>
            <a class="btn-flat" href="<?= site_url('alumnos') ?>">⬅️ Volver</a>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() { M.updateTextFields(); });
    </script>
</body>
</html>
