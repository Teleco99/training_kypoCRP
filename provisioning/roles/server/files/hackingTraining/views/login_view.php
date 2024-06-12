<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <title>Iniciar Sesión</title>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
        	<?php 	
        		echo "<h2> " . $mensaje . " </h2>";
        	?>
            <form action="/index.php?action=login" method="post">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" id="login_button">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</body>
</html>
