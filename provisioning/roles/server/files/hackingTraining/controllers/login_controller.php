<?php
// Lógica de autenticación, por ejemplo, verificar el usuario y la contraseña en una base de datos. 

$mensaje = "Iniciar Sesión";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (autenticarUsuario($databaseConnection, $username, $password)) {
        // Guardamos username y redirigimos al foro
        $_SESSION["username"] = $username; 
        header("Location: /"); 
        exit();
    } else {
        // Si la autenticación falla, mostrar el login con un mensaje de error
        $mensaje = "Usuario o contraseña incorrectas"; 
        require_once(ROOT_DIR . "/views/login_view.php");
        exit();
    }
}

// Cargamos la vista con su mensaje correspondiente
require_once(ROOT_DIR . "/views/login_view.php");

function autenticarUsuario($databaseConnection, $username, $password) {
    
    // Saneamos los parametros de entrada para evitar inyecciones SQL 
    $username = $databaseConnection->escapeString($username);
    $password = $databaseConnection->escapeString($password);

    // Creamos la consulta
    $sql = "SELECT * FROM users_login WHERE user='" . $username . "' AND password='" . $password . "'";

    // Verificamos si el usuario y la contraseña existen en la base de datos
    $num_rows = $databaseConnection->query_num_rows($sql);
    
    $verified = false;
    if($num_rows > 0)   $verified = true;

    return $verified;
}
?>
