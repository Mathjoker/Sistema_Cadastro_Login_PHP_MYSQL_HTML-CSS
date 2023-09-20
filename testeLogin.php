<?php
    session_start();
    require_once('conexao.php');

    //print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        //print_r('Email:' . $email);
        //print_r('Senha:' . $senha);

        $query = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

        $stmt = $conexao->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() === 0){ // Verifica se a 1 ou mais  usuarios repetido com a mesma senha ou email

            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: login.php');
            exit;
        }
        else{

            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: sistema.php');
            exit;
        }




        
    }else{
        header('Location: login.php');
    }

?>