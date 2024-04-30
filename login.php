
<?php
session_start();
if (isset($_GET["email"]) && isset($_GET["contraseña"])) {
    require "basedados.php";

    $email = $_GET["email"];
    $password = $_GET["contraseña"];
    $sql_login = "Select * 
                    from login_table 
                        where var_email ='$email' and var_pass='$password'";
    $result = mysqli_query($connect, $sql_login);

    if ($result) {
        echo "conexion realizada";
        echo " esta es la contraseña: $password y el usuario: $email";

        if (mysqli_num_rows($result) > 0) {
            $rec = mysqli_fetch_row($result);
            $id = $rec[0];
            $_SESSION['usuario_email'] = $rec[1];
            $_SESSION['nombre'] = $rec[3];
            $_SESSION['role'] = $rec[4];
            $_SESSION['status'] = $rec[5];
            print  $_SESSION['role'];
            print "<br>";
            
            if( $_SESSION['role']=="ADMIN"){
                header( "Refresh:2; url=admin_page.php", true, 303);
            }
            if( $_SESSION['role']=="DOCENTE"){
                header( "Refresh:2; url=docente_page.php", true, 303);
            }

            if( $_SESSION['role']=="STUDENT"){
                header( "Refresh:2; url=aluno_page.php", true, 303);
            }



        } else header("Location: ./no_validado.php");
    } else {
        print "Something went wrong!!!";
    }

    // header( "Refresh:2; url=login.html", true, 303);
} else {
    echo "faltan datos";
}


?>
