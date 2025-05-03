<?php
session_start();

if (isset($_SESSION['admin'])) {
    header('Location: adminpanel.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    if ($correo == 'admin@admin.com' && $clave == 'admin123') {
        $_SESSION['admin'] = 'admin';
        header('Location: adminpanel.php');
        exit;
    } else {
        $error = 'Correo o contraseña incorrectos';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <form method="post" action="loginadmin.php">
            <div class="card mt-5">
                <div class="card-header bg-danger">
                    <div class="card-title text-center fs-1 text-white">Ingreso Admin</div>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="correo" class="col-sm-2 col-form-label">E-mail</label>
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
                        <div class="text-center">
                            <a href="login.php" class="btn btn-secondary">Login User</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-end">
                        <button type="submit" class="btn btn-danger btn-lg">Ingresar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
