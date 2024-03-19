<?php

    if(!empty($_GET['id']))
    {
        include_once('./system/config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT *  FROM pontuacao WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM pontuacao WHERE id=$id";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: ../sistema.php');
   
?>