<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>ADMIN</title>
</head>
<!--
La función htmlspecialchars en PHP convierte caracteres especiales a entidades HTML.
Esto es particularmente útil y se recomienda por razones de seguridad cuando se está mostrando contenido dinámico en HTML
que proviene de fuentes no confiables, como entrada del usuario, para prevenir ataques de tipo Cross-Site Scripting (XSS). */
-->
<body>
    <div class="flex min-h-screen bg-gray-100">
        <div class="sidebar">
            <div class="sidebar-header">
                <?php
                session_start();
                echo "<h2>" . $_SESSION["nombre"] . "</h2>";
                echo "<h4>ROLE:" . $_SESSION["role"] . "</h4>";
                ?>
            </div>
            <div class="sidebar-nav">
                <a href="admin_page.html">Inicio</a>
                <a href="gestionar_cursos.php">Cursos</a>
                <a href="gestionar_usuarios.php">Usuarios</a>
                <div class="logout">
                <a href="log_out.php">log_out</a>
                </div>
               

            </div>
        </div>
        <div class="main-content">
            <div class="card w-full max-w-3xl">
                <header>
                    <div class="card-header">
                        <h2 class="card-title">Información Personal</h2>
                        <p class="card-description">Detalles.</p>
                    </div>
                </header>
                <div class="card-content">
                    <form class="space-y-4" action="update_user.php" method="POST">
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div class="space-y-2">

                                <label for="name">Nombre</label>
                                <input id="name" name="name" placeholder="Ingresa tu nombre" value="<?php echo htmlspecialchars($_SESSION['nombre']); ?>" />
                            </div>
                            <div class="space-y-2">
                                <label for="email">Correo Electrónico</label>
                                <input id="email" name="email" placeholder="Ingresa tu correo electrónico" type="email" value="<?php echo htmlspecialchars($_SESSION['usuario_email']); ?>" />
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label for="notes">Notas</label>
                            <textarea id="notes" name="notes" class="min-h-[150px]" placeholder="Ingresa cualquier nota o comentario adicional"></textarea>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn-save">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>