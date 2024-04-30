<?php
session_start();
session_destroy();
echo "<h1>SESION TERMINADA</h1>";
header( "Refresh:2; url=index.html", true, 303);

?>