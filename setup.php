<?php
// setup.php - Script para crear la base de datos y poblarla con datos de ejemplo

// Conectar a SQLite (se crea automáticamente si no existe)
$db = new PDO('sqlite:lab.db');

// Crear tabla de usuarios
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL,
    password TEXT NOT NULL,
    role TEXT NOT NULL
)");

// Crear tabla de productos (para búsquedas vulnerables)
$db->exec("CREATE TABLE IF NOT EXISTS products (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    price REAL NOT NULL,
    description TEXT
)");

// Insertar datos de ejemplo
$db->exec("INSERT OR IGNORE INTO users (username, password, role) VALUES
    ('admin', 'admin123', 'admin'),
    ('user1', 'pass1', 'user'),
    ('user2', 'pass2', 'user'),
    ('test', 'test', 'user')");

$db->exec("INSERT OR IGNORE INTO products (name, price, description) VALUES
    ('Producto A', 10.99, 'Descripción del producto A'),
    ('Producto B', 20.50, 'Descripción del producto B'),
    ('Producto C', 15.00, 'Descripción del producto C')");

echo "Base de datos creada y poblada exitosamente.";
?>