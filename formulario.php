<?php

    require_once('conexao.php');
    

    if(isset($_POST['submit'])){


        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $sexo = $_POST['genero'];
        $dataNasc = $_POST['data_nascimento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];

        $stmt = $conexao->prepare("INSERT INTO usuarios(nome, senha, email, telefone, sexo, data_nasc, cidade, estado, endereco) 
        VALUES ('$nome', '$senha', '$email', '$tel', '$sexo', '$dataNasc', '$cidade', '$estado', '$endereco')");

        $stmt->execute();

        header('Location: login.php');
        exit;

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="home.php">Voltar</a>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><strong>Fórmulario de Clientes</strong></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label class="labelInput" for="nome">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label class="labelInput" for="senha">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label class="labelInput" for="email">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="tel" id="tel" class="inputUser" required>
                    <label class="labelInput" for="tel">Telefone</label>
                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
                <br><br><br>

                <label for="data_nascimento"><strong>Data de Nascimento: </strong></label>
                <input type="date" name="data_nascimento" id="data_nascimento"  required>

                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label class="labelInput" for="cidade">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label class="labelInput" for="estado">Estado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label class="labelInput" for="endereco">Endereço</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">

            </fieldset>
        </form>
    </div>
</body>
</html>