<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit;
}
$username = htmlspecialchars($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Administrador</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Panel Administrador</h1>
            <p>Acceso concedido. Esta página muestra funciones que solo un administrador vería.</p>
        </div>

        <div class="card">
            <h2 class="section-title">Bienvenido, <?php echo $username; ?></h2>
            <p class="output">Tu sesión de administrador te permite revisar datos sensibles y realizar cambios importantes.</p>
        </div>

        <div class="card">
            <h2 class="section-title">Funciones administrativas</h2>
            <ul>
                <li>Revisar estados de usuarios y roles.</li>
                <li>Ver historial de accesos y registros del sistema.</li>
                <li>Gestionar recursos y configuraciones de la aplicación.</li>
                <li>Generar reportes confidenciales.</li>
            </ul>
        </div>

        <div class="card">
            <h2 class="section-title">Información sensible</h2>
            <p class="output">Solo el administrador debe ver esta información. El objetivo del laboratorio es que al explotarse la vulnerabilidad, un atacante pueda llegar a este área.</p>
        </div>

        <div class="card">
            <a class="button-link" href="logout.php">Cerrar sesión</a>
            <a class="nav-link" href="index.php">← Volver a la página principal</a>
        </div>
    </div>
</body>
</html>
