<?php
include "basedados.php";
session_start();

if (isset($_SESSION['usuario_email'])) {
    include "basedados.php";
    //estas lineas las utilizo para el boton de añadr usaurio desde la gestion del admin
    $sql = "SELECT var_role FROM login_table WHERE var_email='" . $_SESSION['usuario_email'] . "'";

    $retval = mysqli_query($connect, $sql);
    if (!$retval) {
        die('Could not get data: ' . mysqli_error($conn)); // se não funcionar dá erro 
    }
    $row = mysqli_fetch_array($retval);

    $tipoUtilizador = $row["var_role"];

    //a partir de aqui se diferencia entre si el usuario se registra el o es el admin el que lo añade 

    $username = $_POST["user_name"];
    $email = $_POST["email"];
    $pass = $_POST["contraseña"];
    
    if ($tipoUtilizador != 'ADMIN') {
        $sql = "INSERT INTO `login_table` (`var_email`, `var_pass`, `var_name`, `var_role`, `var_status`) VALUES ('" . $email . "', '" . $pass . "', '" . $username . "', 'STUDENT', 'off')";
    } else {
        $sql = "INSERT INTO `login_table` (`var_email`, `var_pass`, `var_name`, `var_role`, `var_status`) VALUES ('" . $email . "', '" . $pass . "', '" . $username . "', 'STUDENT', 'on')";
    }
    
    $res = mysqli_query($connect, $sql);

    if(!$res){  
        $_SESSION['error_message'] = "Este email ya está siendo usado: " . mysqli_error($connect);
        header("Location: error_page.html");
        exit();
        } 

    if ($res) {
        if ($tipoUtilizador = 'ADMIN') {
            header("Location: ./gestionar_usuarios.php");
        } else {

            // Consulta para obtener el estado del usuario recién creado
            $query = "SELECT var_status FROM login_table WHERE var_email = '$email'";
            $result = mysqli_query($connect, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $status = $row['var_status'];

                // Redirige basado en el estado del usuario
                if ($status == 'on') {
                    header("Location: ./aluno_page.php");
                } else {
                    header("Location: ./no_validado.php");
                }
            } else {
                echo "Error al obtener el estado del usuario.";
                // Opcionalmente redirigir a una página de error
            }
        }
    } else {
        echo "Error al insertar el usuario.";
        // Opcionalmente redirigir a una página de error
    }
}
