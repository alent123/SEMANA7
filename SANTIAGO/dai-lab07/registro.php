<?php
session_start();
require_once('./model/Usuario.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    $usuarios = Usuario::obtenerUsuarios();
    foreach ($usuarios as $usuario) {
        if ($usuario['correo'] === $correo) {
            $error = "Este correo ya está registrado.";
            break;
        }
    }

    if (!isset($error)) {
        $conn = BaseMySql::conexion();
        $sql = "INSERT INTO usuarios (nombre, correo, clave) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nombre, $correo, $clave]);

        header('Location: login.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form method="post" action="registro.php">
            <div class="card mt-5">
                <div class="card-header bg-warning">
                    <div class="card-title text-center fs-1 text-white">Registro</div>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="correo" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="clave" class="col-sm-2 col-form-label">Contraseña</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="clave" required>
                        </div>
                    </div>

                    <?php if (isset($error)): ?>
                        <div class="text-danger text-center">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <div class="mb-3 row">
                        <div class="text-end">
                            <a href="login.php">¿Ya tienes cuenta? Inicia sesión aquí</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-end">
                        <button type="submit" class="btn btn-success btn-lg">Registrar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
