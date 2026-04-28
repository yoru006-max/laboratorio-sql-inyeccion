# Laboratorio de SQL Injection

Página web sencilla para demostrar vulnerabilidades de SQL Injection desde las perspectivas de usuario y administrador.

## Requisitos

- PHP con soporte para PDO y SQLite (incluido en la mayoría de instalaciones de PHP).

## Instalación

1. Asegúrate de tener PHP instalado.
2. Ejecuta el script de configuración para crear la base de datos:
   ```
   php setup.php
   ```

## Ejecución

Inicia el servidor web integrado de PHP:
```
php -S localhost:8000
```

## Acceso

- **Página principal**: http://localhost:8000/
- **Interfaz de Usuario**: http://localhost:8000/user.php
- **Interfaz de Admin**: http://localhost:8000/admin.php

## Uso

### Usuario
- Elige la entrada de usuario desde la página principal.
- El login es vulnerable: puedes loguear como usuario común y acceder a tu panel con funciones como buscar productos.

### Admin
- Elige la entrada de admin desde la página principal.
- El login de admin es vulnerable y requiere credenciales de administrador.
- Si logueas correctamente o con una inyección exitosa, accederás al panel de administración con datos sensibles.

## Advertencia

Este laboratorio es solo para fines educativos. Las consultas son intencionalmente vulnerables. **NO uses estas técnicas en producción.**

## Datos de Ejemplo

Usuarios:
- admin / admin123 (admin)
- user1 / pass1 (user)
- user2 / pass2 (user)
- test / test (user)

Productos: Producto A, B, C con precios y descripciones.
