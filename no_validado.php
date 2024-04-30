<?php
include "basedados.php";
session_start();
// Supongamos que $student_id contiene el ID del estudiante que vamos a verificar
$student_mail = $_SESSION["email"]; // Asegúrate de validar y limpiar adecuadamente este dato

// Consulta para verificar el estado del alumno
$sql = "SELECT var_status FROM login_table WHERE var_email = '$student_mail'";
$result = mysqli_query($connect, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $status = $row['var_status'];

    // Comprobar si el estado es 'waiting_for_validation'
    if ($status != 'off') {
        header("Location: aluno_page.php"); // Redirecciona si el alumno no está en estado de espera
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <section class="login-section">
        <div class="login-card">

            <div class="card-body">
                <div class="spinner"></div>
                <h2 class="card-title">Waiting</h2>
                <p class="card-description">Please wait, your account it's been validating.</p>
                <p class="card-description">Its can take a few moments.</p>
            </div>
            <div class="card-content">
                <div class="loginButton">
                <a href="index.html">Volver a la pagina Principal</a>
                </div>
            </div>
        </div>


    </section>

</body>

</html>