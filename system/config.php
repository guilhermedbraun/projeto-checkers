<?php

    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '816435';
    $dbName = 'checkers';
    
    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    // if($conexao->connect_errno)
    // {
    //     echo "Erro";
    // }
    // else
    // {
    //     echo "Conexão efetuada com sucesso";
    // }

?>