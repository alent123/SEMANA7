# Laboratorio 7 
**Alumno:** \[santiago agustin salas perez]

**Docente:** \[Nilton Cesar Mercado Chavez]

---

## Contenido del Repositorio

```
DAI-LAB07-MASTER
├── model
│   ├── BaseMySql.php    # Conexión PDO a MySQL
│   ├── Lista.php       # Lógica de listas de usuarios (opcional)
│   ├── Usuario.php     # Operaciones con la tabla usuarios
├── adminpanel.php      # Panel de administración (lista/elimina usuarios)
├── eliminarusuario.php # Script para eliminar usuario
├── index.php           # Página principal post-login (muestra datos y lista)
├── login.php           # Formulario y lógica de login de usuario
├── logout.php          # se encarga de cerrar la sesión del usuario
├── loginadmin.php      # Formulario de login de administrador (opcional)
├── registrar.php       # Lógica de registro de usuario
├── registro.php        # Formulario de registro de usuario
├── salir.php           # Cierre de sesión (admin and user)
└── README.md           # Documentación (este archivo)
```

---

## 1. Requisitos

* Servidor web local XAMPP
* MySQL (Directo de XAMPP)
* Apache (Directo de XAMPP)

---

## 2. Crear Base de Datos

1. Abre phpMyAdmin.
2. Ve a la pestaña **SQL** y pega:

```sql
CREATE DATABASE IF NOT EXISTS laboratorio70;
USE laboratorio70;

CREATE TABLE IF NOT EXISTS usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  correo VARCHAR(100) UNIQUE NOT NULL,
  clave VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS admin (
  id INT AUTO_INCREMENT PRIMARY KEY,
  correo VARCHAR(100) UNIQUE NOT NULL,
  clave VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (nombre, correo, clave) VALUES
('Juan Pérez', 'juanperez@example.com', '1234'),
('María Sosa', 'mariasosa@example.com', '9876');

INSERT INTO admin (correo, clave) VALUES
('admin@admin.com', 'admin123');
```

3. Ejecuta el script para crear la BD y tablas con datos de ejemplo.

---

## 3. Configuración de Conexión

En `model/BaseMySql.php`, ajusta si hace falta:

```php
public static function conexion()
{
    $dsn = "mysql:host=localhost;dbname=laboratorio70;port=3306;charset=utf8mb4";
    $user = "root";
    $pass = "";
    $opts = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    return new PDO($dsn, $user, $pass, $opts);
}


