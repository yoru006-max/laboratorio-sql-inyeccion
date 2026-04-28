<?php
// db.php - Conexión a la base de datos

function getDB() {
    return new PDO('sqlite:lab.db');
}
?>