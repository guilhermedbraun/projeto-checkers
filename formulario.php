<?php

    if(isset($_POST['submit']))
    {

        include_once('./system/config.php');

        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $dama = $_POST['dama'];
        $resposta = $_POST['resposta'];

        $result = mysqli_query($conexao, "INSERT INTO pontuacao(nome,senha,dama,resposta) 
        VALUES ('$nome','$senha','$dama','$resposta')");

        header('Location: ./login.php');
    }

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Checkers</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
        }
        .box{
            color: #ffffff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid #1e90ff;
        }
        legend{
            border: 1px solid #1e90ff;
            padding: 10px;
            text-align: center;
            background-color: #1e90ff;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid #ffffff;
            outline: none;
            color: #ffffff;
            font-size: 15px;
            width: 100%;
            height: 30px;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: #1e90ff;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: #ffffff;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
        .oculto {
            display: none;
        }
    </style>
</head>
<body>
    <a href="home.php">Voltar</a>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Registre-se</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" minlength="4" maxlength="100" required>
                    <label for="nome" class="labelInput">Nome</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" minlength="4" maxlength="10" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br>
                <div class="oculto" >
                    <input type="radio" id="dama" name="dama" value="0" checked required>
                </div>
                <div class="oculto" >
                    <input type="radio" id="resposta" name="resposta" value="0" checked required>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit" value="Salvar">
            </fieldset>
        </form>
    </div>
</body>
</html>