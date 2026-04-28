<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header('Location: index.php');
    exit;
}
$username = htmlspecialchars($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Panel de Usuario</h1>
            <p>Acceso concedido. Esta página muestra funciones que un usuario común necesitaría.</p>
        </div>

        <div class="card">
            <h2 class="section-title">Bienvenido, <?php echo $username; ?></h2>
            <p class="output">Tu sesión de usuario te permite acceder a funciones básicas de la tienda online.</p>
        </div>

        <div class="card">
            <h2 class="section-title">Mi Perfil</h2>
            <p class="output"><strong>Usuario:</strong> <?php echo $username; ?></p>
            <p class="output"><strong>Correo:</strong> <?php echo $username; ?>@tienda.com</p>
            <p class="output"><strong>Rol:</strong> Usuario común</p>
            <p class="output"><strong>Pedidos realizados:</strong> 5</p>
        </div>

        <div class="card">
            <h2 class="section-title">Funciones de Usuario</h2>
            <ul>
                <li><strong>Buscar productos:</strong> Encuentra artículos en la tienda.</li>
                <li><strong>Ver catálogo:</strong> Navega entre los productos disponibles.</li>
                <li><strong>Revisar pedidos:</strong> Consulta tu historial de compras.</li>
                <li><strong>Comentarios:</strong> Deja reseñas en productos.</li>
                <li><strong>Carrito de compras:</strong> Guarda artículos para comprar después.</li>
            </ul>
        </div>

        <div class="card">
            <h2 class="section-title">Buscar Productos</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="name">Nombre del producto</label>
                    <input type="text" id="name" name="name" placeholder="Introduce el nombre del producto">
                </div>
                <button type="submit">Buscar</button>
            </form>
        </div>

        <?php
        include 'db.php';
        $db = getDB();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];

            // Consulta vulnerable (NO HACER ESTO EN PRODUCCIÓN)
            $query = "SELECT * FROM products WHERE name LIKE '%$name%'";
            $stmt = $db->query($query);
            $products = $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];

            echo '<div class="card">';
            echo '<h2 class="section-title">Resultados de productos</h2>';
            if ($products) {
                echo '<table><tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Descripción</th></tr>';
                foreach ($products as $product) {
                    echo '<tr><td>' . htmlspecialchars($product['id']) . '</td><td>' . htmlspecialchars($product['name']) . '</td><td>$' . htmlspecialchars($product['price']) . '</td><td>' . htmlspecialchars($product['description']) . '</td></tr>';
                }
                echo '</table>';
            } else {
                echo '<p class="output">No se encontraron productos.</p>';
            }
            echo '</div>';
        }
        ?>

        <div class="card">
            <a class="button-link" href="logout.php">Cerrar sesión</a>
            <a class="nav-link" href="index.php">← Volver a la página principal</a>
        </div>
    </div>
</body>
</html>