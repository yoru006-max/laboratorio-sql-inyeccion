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
    <title>Laboratorio SQL Injection - Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Entrada de Usuario</h1>
            <p>Login vulnerable para demostrar SQL Injection en credenciales.</p>
        </div>

        <div class="card">
            <form method="POST">
                <div class="form-group">
                    <label for="username">Usuario</label>
                    <input type="text" id="username" name="username" placeholder="Introduce tu usuario" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Introduce tu contraseña" required>
                </div>
                <button type="submit">Iniciar Sesión</button>
            </form>

            <?php
            include 'db.php';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];

                // Consulta vulnerable (NO HACER ESTO EN PRODUCCIÓN)
                $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                $db = getDB();
                $stmt = $db->query($query);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['role'] = $user['role'];
                    if ($user['role'] === 'admin') {
                        header('Location: dashboard.php');
                        exit;
                    } elseif ($user['role'] === 'user') {
                        header('Location: user_dashboard.php');
                        exit;
                    }
                    echo "<div class=\"output\"><strong>Bienvenido:</strong> " . htmlspecialchars($user['username']) . ". Rol: " . htmlspecialchars($user['role']) . "</div>";
                } else {
                    echo "<div class=\"output\">Credenciales incorrectas.</div>";
                }
            }
            ?>

            <a class="nav-link" href="index.php">← Volver a la página principal</a>
        </div>
    </div>
</body>
</html>