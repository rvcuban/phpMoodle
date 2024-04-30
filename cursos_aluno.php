<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Cursos</title>
    <link rel="stylesheet" href="estilo_cursos.css">
</head>

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
                <a href="index.html">Inicio</a>
                <a href="gestionar_cursos.php">Mis Cursos</a>
            </div>
        </div>
        <div class="main-content">
            <header>
                <h1>Todos los Cursos</h1>
                <?php
                if($_SESSION['role']!="ADMIN")
                ECHO"<p>Aquí están los cursos en los que estás inscrito este semestre.</p>";
                ?>
                
            </header>
            <div class="courses">
                <?php
                require "basedados.php";
                $sql_courses = 'SELECT* FROM courses_table ';
                mysqli_select_db($connect, 'lpi_database');
                $lista_cursos = mysqli_query($connect,  $sql_courses);
                if (!$lista_cursos) {
                    die('Could not get data: ' . mysqli_error($connect)); // se não funcionar dá erro
                }
                while ($row = mysqli_fetch_array($lista_cursos)) {
                    echo " <div class=" . "course-card" . ">
                <h2>" . $row['nombre_curso'] . "</h2>" .
                        "<p>COD".$row['id_cursos']." - Prof.".$row['id_profesor']. "</p>" .
                        "<a href=" . "#" . ">Ver</a>" .
                        "</div>";
                }
                ?>
                <!-- Aquí podrías generar dinámicamente los cursos con PHP -->
                <div class="course-card">
                    <h2>Introducción a la Ciencia de la Computación</h2>
                    <p>CSC 101 - Prof. M. Anderson</p>
                    <a href="#">Ver</a>
                </div>
                <!-- Repetir para otros cursos -->
            </div>
        </div>
    </div>
</body>

</html>