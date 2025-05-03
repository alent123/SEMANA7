<?php
class Lista
{
    private $usuarios = [];

    public function agregarUsuario($usuario)
    {
        $this->usuarios[] = $usuario;
    }

    public function getUsuarios()
    {
        return $this->usuarios;
    }
}
?>
