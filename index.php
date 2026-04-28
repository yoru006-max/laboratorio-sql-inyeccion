<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Laboratorio SQL Injection</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Laboratorio SQL Injection</h1>
            <p>Selecciona tu entrada para practicar SQL Injection desde el lado de usuario o administrador.</p>
        </div>

        <div class="actions">
            <a class="button-link" href="user.php">Entrada Usuario</a>
            <a class="button-link card-admin" href="admin.php">Entrada Admin</a>
        </div>

        <div class="card">
            <h2 class="section-title">Credenciales de ejemplo</h2>
            <p class="output">Usuario común: <strong>user1</strong> / <strong>pass1</strong></p>
            <p class="output">Administrador: <strong>admin</strong> / <strong>admin123</strong></p>
            <p class="output">Estas páginas son vulnerables a SQL Injection, pero no se muestran los payloads directamente para que puedas descubrirlos por ti mismo.</p>
        </div>
    </div>
</body>
</html>