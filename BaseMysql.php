<?php
class BaseMySql
{
    public static function conexion()
    {
        try {
            $conn = "mysql:host=localhost;dbname=laboratorio70;port=3306;charset=utf8mb4";
            $usuario = "root";
            $password = "";
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            return new PDO($conn, $usuario, $password, $options);
        } catch (PDOException $error) {
            echo '<h2>No fue posible conectarse a la base de datos...</h2>' . $error->getMessage();
            exit;
        }
    }
}
