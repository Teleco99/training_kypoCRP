<?php

class Database
{
    private $host = HOST_DB;
    private $username = USER_DB;
    private $password = PASS_DB;
    private $database = DB;
    private $connection;

    // Constructor 
    public function __construct()
    {
        $this->connect();
    }

    // Conectar a la base de datos
    private function connect()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        $this->connection->set_charset("utf8");

        // Verificar la conexión
        if ($this->connection->connect_error) {
            die("Conexión fallida: " . $this->connection->connect_error);
        }
    }

    // Obtener el número de filas
    public function query_num_rows($sql)
    {
        $result = $this->connection->query($sql);

        // Devolvemos el resultado de la consulta fue exitosa
        return $result->num_rows;
    }

    // Obtener un solo resultado como un array asociativo
    public function getSingleResult($sql)
    {
        $result = $this->connection->query($sql);
        return $result->fetch_assoc();
    }

    // Obtener todos los resultados como un array de arrays asociativos
    public function getAllResults($sql)
    {
        $result = $this->connection->query($sql);
        $rows = [];

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    // Obtener el ID del último elemento insertado
    public function getLastInsertId()
    {
        return $this->connection->insert_id;
    }

    // Escapar una cadena para usar en una consulta SQL
    public function escapeString($value)
    {
        return $this->connection->real_escape_string($value);
    }

    // Insertar un comentario en la tabla foro_comments
    public function insertComment($user, $comment)
    {
        // Escapa las variables para prevenir inyección de SQL
        $user = $this->escapeString($user);
        $comment = $this->escapeString($comment);

        // Construye la consulta SQL de inserción
        $sql = "INSERT INTO foro_comments (user, comment) VALUES ('$user', '$comment')";

        // Ejecuta la consulta
        $result = $this->connection->query($sql);

        // Devuelve si la consulta ha sido o no exitosa
        return $result;
    }

    // Cerrar la conexión cuando la instancia de la clase se destruye
    public function __destruct()
    {
        $this->connection->close();
    }
}

?>
