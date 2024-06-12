<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro - Comentarios de la asignatura</title>
    <link rel="stylesheet" href="/css/foro.css">
</head>
<body>
    <header>
        Foro
    </header>
   <a href="/index.php?action=logout" class="button-box right">Cerrar Sesión</a>
    <div id="comment-box">
        <h2>Comentarios</h2>
        <?php
        // Aquí incluimos lógica PHP para mostrar comentarios desde una base de datos.
        foreach ($comments as $register) {
            echo "<p><strong>" . $register["user"] . ":</strong>" . $register["comment"] . "</p>";
        }
        ?>
    </div>

    <div id="comment-form">
        <h2>Añadir Comentario</h2>
        <form action="/index.php?action=foro" method="post">
            <label for="comment">Tu Comentario:</label><br>
            <textarea id="comment" name="comment" required></textarea><br>
            <p>Tu Nombre de Usuario: <strong><?php echo $username ?></strong></p>
            <input type="submit" class="button-box" value="Enviar Comentario">
        </form>
    </div>
</body>
</html>
