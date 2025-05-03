<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: loginadmin.php');
    exit();
}

require_once('./model/BaseMySql.php');
$conn = BaseMySql::conexion();

$sql = "SELECT * FROM usuarios";
$stmt = $conn->prepare($sql);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Panel de Administración</h1>
        
        <div class="card">
            <div class="card-header bg-success text-white">
                Bienvenido 
            </div>
            <div class="card-body">
                <p class="fs-5">Eres administrador.</p>
                <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
            </div>
        </div>

        <h2 class="mt-4">Lista de Usuarios</h2>
        
        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Contraseña</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['correo']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['clave']); ?></td>
                        <td>
                            <a href="eliminarusuario.php?id=<?php echo $usuario['id']; ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
