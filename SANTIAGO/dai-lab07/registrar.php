<?php
require_once('./model/BaseMySql.php');
require_once('./model/Usuario.php');

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];

$claveCifrada = password_hash($clave, PASSWORD_DEFAULT);

$db = BaseMySql::conexion();

$sql = "INSERT INTO usuarios (nombre, correo, clave) VALUES (:nombre, :correo, :clave)";
$stmt = $db->prepare($sql);

$stmt->execute([
    ':nombre' => $nombre,
    ':correo' => $correo,
    ':clave' => $claveCifrada
]);

header('Location: login.php');
exit;
?>
