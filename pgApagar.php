<?php 
session_start();
if ($_SESSION['role'] == "ADMIN" && $_SESSION['var_status']="on") {

 $id_user = $_POST["user_id"]; 

 include "./basedados.php"; 

// un administrador no puede apagarse a si mismo 
$sql_comprobar = "SELECT id FROM login_table WHERE var_email = '" . $_SESSION['usuario_email'] . "'";
$retval=mysqli_query ($connect, $sql_comprobar); 
if(! $retval){
    die('Could not get data: ' . mysqli_error($connect));// se não funcionar dá erro
}

if (mysqli_num_rows($retval) > 0) {
    $rec = mysqli_fetch_row($retval);
    $id_obtenido = $rec[0];
}

if($id_obtenido ==$id_user){
    echo "Lo siento, un administrador no puede apagarse a si mismo";
    header( "Refresh:2; url=gestionar_usuarios.php", true, 303);
}

  $sql = "UPDATE login_table SET var_status = 'off' WHERE id='$id_user'";
  $res = mysqli_query ($connect, $sql); 
  if(! $res ){
    die('Could not get data: ' . mysqli_error($connect));// se não funcionar dá erro
}
  header ("Location:gestionar_usuarios.php"); 
}
  ?> 