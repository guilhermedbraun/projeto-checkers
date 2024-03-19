<?php

    include_once('./system/config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $dama = $_POST['dama'];
        $resposta = $_POST['resposta'];
        
        $sqlInsert = "UPDATE pontuacao 
        SET nome='$nome',dama='$dama',resposta='$resposta'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: sistema.php');

?>