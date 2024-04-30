<?php
session_start();
if(isset($_SESSION['usuario_email'])){ 
include "basedados.php";
$sql = "SELECT var_role FROM login_table WHERE var_email='".$_SESSION['usuario_email']."'";

$retval = mysqli_query( $connect, $sql );  
if(! $retval ){  
     die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro 
     }  
$row = mysqli_fetch_array($retval); 

$tipoUtilizador = $row["var_role"]; 
$pode=true; 
if($tipoUtilizador!='ADMIN'){ 
      $pode=false;  
       echo "<script> setTimeout(function () { window.location.href = './pagina_inicial.php'; }, 000)</script>";  
    } 
 if($pode){
    header("Location: ./registro.html");

 }


    

}

?>