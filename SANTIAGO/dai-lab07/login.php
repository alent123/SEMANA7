<?php
session_start();
require_once __DIR__ . '/model/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $clave  = $_POST['clave'];

    $usuarios      = Usuario::obtenerUsuarios();
    $usuarioValido = null;
    foreach ($usuarios as $u) {
        if ($u['correo'] === $correo && $u['clave'] === $clave) {
            $usuarioValido = $u;
            break;
        }
    }

    if ($usuarioValido) {
        $_SESSION['usuario'] = $usuarioValido;
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['error'] = 'Correo o contraseña incorrectos.';
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
    <title>Login Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
  <form method="post" action="login.php">
    <div class="card mt-5">
      <div class="card-header bg-warning text-center text-white fs-1">Iniciar Sesión</div>
      <div class="card-body">
        <?php if (!empty($_SESSION['error'])): ?>
          <div class="alert alert-danger text-center">
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
          </div>
        <?php endif; ?>
        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label">Correo</label>
          <div class="col-sm-10">
            <input type="email" name="correo" class="form-control" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label">Contraseña</label>
          <div class="col-sm-10">
            <input type="password" name="clave" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="card-footer text-end">
        <button type="submit" class="btn btn-success btn-lg">Ingresar</button>
      </div>
    </div>
  </form>

  <div class="text-center mt-3">
    <a href="registro.php" class="btn btn-primary btn-lg">Regístrate</a>
    <a href="loginadmin.php" class="btn btn-secondary btn-lg">Login Admin</a>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
