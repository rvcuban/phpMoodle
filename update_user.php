<?php
session_start();

include "basedados.php";

if(isset($_POST["user_id"])){
$id= $_POST["user_id"];
$mail = $_POST["email"];
$pass = $_POST["pass"];
$nombre = $_POST["name"];
$role = $_POST["role"];

echo $id .$mail .$pass .$nombre .$role;
$sql = "UPDATE login_table SET var_email = '$mail', 
                               var_pass = '$pass', 
                               var_name = '$nombre', 
                               var_role = '$role' 
                WHERE id = '$id'";
$retval=mysqli_query($connect,$sql);
if(!$retval){
    die('Could not get data: ' . mysqli_error($connect));// se não funcionar dá erro
}



echo "sin errores de moemnto";

}



?>