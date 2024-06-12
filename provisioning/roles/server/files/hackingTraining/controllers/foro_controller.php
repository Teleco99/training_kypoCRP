<?php
// Lógica del foro, por ejemplo cargar los comentarios en la base de datos y mostrarlos en la vista

// Comprobamos si hay comentarios enviados por POST y en caso afirmativo los subimos a la base de datos
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["comment"])) {
$username = $_SESSION['username'];
$comment = $_POST['comment'];

$result = $databaseConnection->insertComment($username, $comment);
}

// Cargamos los comentarios del foro
$sql = "SELECT * FROM foro_comments";
$comments = $databaseConnection->getAllResults($sql);

// Cargamos la vista con los comentarios
require_once(ROOT_DIR . "/views/foro_view.php");

?>
