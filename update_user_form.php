<?php
session_start();
if ($_SESSION['role'] == "ADMIN" && $_SESSION['status'] == "on") {
    include "basedados.php";
    if (isset($_POST["user_id"])) {
        $id_user = $_POST["user_id"];
        $sql_usuarios = "SELECT* FROM login_table where id = '" . $id_user . "'";
        $retval = mysqli_query($connect, $sql_usuarios);
        if (!$retval) {
            die('Could not get data: ' . mysqli_error($connect)); // se não funcionar dá erro
            header("Location:gestionar_usuarios.php");
        }
        if (mysqli_num_rows($retval) > 0) {
            $rec = mysqli_fetch_row($retval);
            $id = $rec[0];
            $mail = $rec[1];
            $pass = $rec[2];
            $nombre = $rec[3];
            $role = $rec[4];
        }
    } else
        echo " faltan datos";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Document</title>
</head>

<body>
<div class="flex min-h-screen bg-gray-100">
<div class="sidebar">
            <div class="sidebar-header">
                <?php
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
                    <h2 class="card-title">Información Personal de <?php echo $nombre  ?></h2>
                    <p class="card-description">Detalles.</p>
                </div>
            </header>
            <div class="card-content">
                <form class="space-y-4" action="update_user.php" method="POST">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

                    <input type='hidden' name='user_id' value="<?php echo htmlspecialchars($id); ?>"/>
                        <div class="space-y-2">
                       
                            <label for="name">Nombre</label>
                            <input id="name" name="name" placeholder="Ingresa tu nombre" value="<?php echo htmlspecialchars($nombre); ?>" />
                        </div>
                        <div class="space-y-2">
                            <label for="email">Correo Electrónico</label>
                            <input id="email" name="email" placeholder="Ingresa tu correo electrónico" type="email" value="<?php echo htmlspecialchars($mail); ?>" />
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="password">Contraseña</label>
                        <input id="pass" name="pass" placeholder="contraseña" type="text" value="<?php echo htmlspecialchars($pass); ?>" />
                    </div>

                    <div class="space-y-2">
                        <label for="role">Role</label>
                        <select id="role" name="role">
                        <!-- aqui utilizamos el operador ternario con la propiedad de los opction selected para que aparezca por defecto la opcion seleccionada en la base de datos
                    Si quitase el php apareceria lo mismo lo unico que el estado actual seria desconocido-->
                            <option value="ADMIN" <?php echo $role == 'ADMIN' ? 'selected' : ''; ?>>Administrador</option>
                            <option value="DOCENTE" <?php echo $role == 'DOCENTE' ? 'selected' : ''; ?>>Docente</option>
                            <option value="STUDENT" <?php echo $role == 'STUDENT' ? 'selected' : ''; ?>>Estudiante</option>
                        </select>
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