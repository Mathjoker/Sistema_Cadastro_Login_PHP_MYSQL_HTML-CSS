<?php
    session_start();
    require_once('conexao.php');
    //print_r($_SESSION);

    if((!isset($_SESSION['email']) == true) && (!isset($_SESSION['senha']) == true)){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['email'];

    $array = "SELECT * FROM usuarios ORDER BY id DESC";

    $result = $conexao->prepare($array);
    $result->execute();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Sistema</title>
    <style>
        body{
        background-image: linear-gradient(45deg, rgb(38, 47, 177), rgb(90, 36, 151));
        color: white;
        text-align: center;
        }   

        .table-bg{
        background: rgba(0, 0, 0, 0.5);
        border-radius: 15px 15px 0 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistema do Matheus</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger me-5" >Sair</a>
        </div>
    </nav>
    <br>
    <?php
        echo "<h1>Bem Vindo <u>$logado</u></h1>";
    ?>
    <div class="m-5">
        <table class="table table-dark text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = $result->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr>";
                            echo "<td>". $user_data['id']."</td>";
                            echo "<td>". $user_data['nome']."</td>";
                            echo "<td>". $user_data['senha']."</td>";
                            echo "<td>". $user_data['email']."</td>";
                            echo "<td>". $user_data['telefone']."</td>";
                            echo "<td>". $user_data['sexo']."</td>";
                            echo "<td>". $user_data['data_nasc']."</td>";
                            echo "<td>". $user_data['cidade']."</td>";
                            echo "<td>". $user_data['estado']."</td>";
                            echo "<td>". $user_data['endereco']."</td>";
                            echo "<td>açoes</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>