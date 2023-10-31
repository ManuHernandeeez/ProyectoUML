<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $db = new PDO("mysql:host=localhost;dbname=restaurante", "root", "");

    // Obtención de los datos del formulario
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Validación y escapado de datos (debes hacer más validaciones aquí)
    $usuario = htmlspecialchars($usuario);
    $contrasena = htmlspecialchars($contrasena);

    // Inserción de los datos en la base de datos (debes hacer más seguridad aquí)
    $query = "INSERT INTO usuarios (usuario, contrasena) VALUES (:usuario, :contrasena)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":usuario", $usuario);
    $stmt->bindParam(":contrasena", $contrasena);
    $stmt->execute();

    // Redirección al inicio de sesión
    header("Location: login.html");
}
?>
