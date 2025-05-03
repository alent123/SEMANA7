<?php
require_once __DIR__ . '/BaseMySql.php';

class Usuario
{
    public static function obtenerUsuarios()
    {
        $conn = BaseMySql::conexion();
        $sql  = "SELECT * FROM usuarios";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function eliminarUsuario($id)
    {
        $conn = BaseMySql::conexion();
        $sql  = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }
}
