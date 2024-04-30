<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Gestion de uSUARIOS</title>
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
                <a href="gestionar_cursos.php">Cursos</a>
                <a href="gestionar_usuarios.php">Usuarios</a>
                <div class="logout">
                <a href="log_out.php">log_out</a>
                </div>
            </div>
        </div>

        <div class="container" >
            <div class="header">
                <h1>Lista de Usuarios</h1>
                <div class="search-and-add">
                    <div class="search-box">
                        <input type="search" placeholder="Buscar...">
                        <!-- Ícono de búsqueda (Ejemplo con Font Awesome) -->
                        <i class="fa fa-search"></i>
                    </div>
                    <a class="add-user-btn" href="add_user.php">Añadir Usuario</a>
                </div>
            </div>
            <center>
                <?php
                require "basedados.php";
                if ($_SESSION['role'] == "ADMIN") {

                    // Cria a tabela
                    echo "<table class=" . "users-table" . ">
                    <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>password</th>
                    <th>Role</th>
                    <th>STATUS</th>
                    <th>ACTIONS</th>


                    </tr>";
                    // Liga a tabela na base de dados
                    $sql_usuarios = 'SELECT* FROM login_table ';
                    $sql_profesores = 'SELECT* FROM login_table where var_role="DOCENTE" ';
                    $sql_admins = 'SELECT* FROM login_table where var_role="ADMIN" ';
                    //Seleciona a base de dados
                    mysqli_select_db($connect, 'lpi_database');
                    $lista_usuarios = mysqli_query($connect, $sql_usuarios);
                    if (!$lista_usuarios) {
                        die('Could not get data: ' . mysqli_error($connect)); // se não funcionar dá erro
                    }
                    while ($row = mysqli_fetch_array($lista_usuarios)) { // vai buscar ha base de dados os dados nela guardada e poem os na tabela

                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['var_name'] . "</td>";
                        echo "<td>" . $row['var_email'] . "</td>";
                        echo "<td>" . $row['var_pass'] . "</td>";
                        echo "<td>" . $row['var_role'] . "</td>";
                        echo "<td>" . $row['var_status'] . "</td>";
                        // echo "<td>".
                        // "<a href='apaga_livro.php?titulo=". $row['titulo'] ."'>DELETE</a>". 

                        // "</td>";
                        if($row['var_status']=="on"){
                    
                        }
                        echo "<td>" .
                            '<form action="update_user_form.php" method="POST">' .
                            "<input type='hidden' name='user_id' value='" . $row['id'] . "' />" .
                            "<input type='submit' value='MODIFY' />" .
                            "</form>" .
                            "<br>" ;

                            if($row['var_status']=="on"){
                                //echo"	<td><a href='./pgApagar.php?IdUser=".$row["id"]."' ></a></td>";
                                echo
                                '<form action="pgApagar.php" method="POST">' .
                                "<input type='hidden' name='user_id' value='" . $row['id'] . "' />" .
                                "<input type='submit' value='PUT OFF' />" .
                                "</form>";
                            }else{
                                echo
                                '<form action="pgEncender.php" method="POST">' .
                            "<input type='hidden' name='user' value='" . $row['id'] . "' />" .
                            "<input type='submit' value='PUT ON' />" .
                            "</form>";
                            }

                            echo "</td>";

                        echo "</tr>";
                    }
                    
                    echo "</table><br/>  <a href='admin_page.php'>Voltar ao ínicio</a>"; // fecha a tabela e uma hiperligação para voltar ao inicio do site
                    mysqli_close($connect);
                }

                ?>
            </center>
        </div>
    </div>
</body>

</html>