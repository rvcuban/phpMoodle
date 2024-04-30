<?php
  
  $servername = "localhost"; // o la IP del servidor de la base de datos
  $username = "root";
  $password = "empty"; //no hay contraseña 
  $database = "lpi_database";
  
  // Crear conexión
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $connect = mysqli_connect("localhost", "root", null,"lpi_database") or die("Unable to connect to#DB!!!");

  
?>