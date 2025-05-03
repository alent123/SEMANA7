<?php
require_once('./model/Usuario.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    Usuario::eliminarUsuario($id);
    header('Location: adminpanel.php');
    exit;
}
?>
