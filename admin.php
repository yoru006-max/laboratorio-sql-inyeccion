<?php
session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Laboratorio SQL Injection - Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Entrada de Administrador</h1>
            <p>Login vulnerable para demostrar SQL Injection en credenciales de administrador.</p>
        </div>

        <div class="card">
            <form method="POST">
                <div class="form-group">
                    <label for="username">Usuario Administrador</label>
                    <input type="text" id="username" name="username" placeholder="Introduce tu usuario de admin" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Introduce tu contraseña" required>
                </div>
                <button type="submit">Iniciar Sesión como Admin</button>
            </form>

            <?php
            include 'db.php';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];

                // Consulta vulnerable (NO HACER ESTO EN PRODUCCIÓN) - Solo permite admin
                $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND role = 'admin'";
                $db = getDB();
                $stmt = $db->query($query);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user && $user['role'] === 'admin') {
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['role'] = $user['role'];
                    header('Location: dashboard.php');
                    exit;
                } else {
                    echo "<div class=\"output\">Credenciales incorrectas o no tienes permisos de administrador.</div>";
                }
            }
            ?>

            <a class="nav-link" href="index.php">← Volver a la página principal</a>
        </div>
    </div>
</body>
</html>