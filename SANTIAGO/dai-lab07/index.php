<?php
require_once('./model/Usuario.php');
require_once('./model/Lista.php');

session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

$usuario = $_SESSION['usuario'];
$usuarios = Usuario::obtenerUsuarios();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laboratorio 7</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous"
  >
</head>

<body>
  <div class="container">
    <div class="card mt-5">
      <div class="card-header bg-info">
        <div class="card-title text-center fs-1 text-white">Bienvenido</div>
      </div>
      <div class="card-body">
        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label">Nombre</label>
          <div class="col-sm-10">
            <div class="card-text">
              <?= htmlspecialchars($usuario['nombre'], ENT_QUOTES) ?>
            </div>
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label">E-mail</label>
          <div class="col-sm-10">
            <div class="card-text">
              <?= htmlspecialchars($usuario['correo'], ENT_QUOTES) ?>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="text-end">
          <a href="salir.php" class="btn btn-danger btn-lg">Salir</a>
        </div>
      </div>
    </div>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
  ></script>
</body>

</html>
