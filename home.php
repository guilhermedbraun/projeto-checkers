<?php
    session_start();
    include_once('./system/config.php');
    // print_r($_SESSION);

    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM pontuacao WHERE nome LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM pontuacao ORDER BY id DESC";
    }
    $result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Checkers</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            text-align: center;
            color: #ffffff;
        }
        h1 {
            margin: 30px auto;
        }
        .box {
            display: flex;
            position: relative;
            width: 90%;
            height: 70px;
            margin: 0 auto;
            justify-content: center;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
        }
        .box li {
            display: "";
            position: relative;
            width: 150px;
            height: 40px;
            margin: auto 10px;
            list-style: none;
            /*border: 1px solid #ffffff;*/
        }
        .box li a {
            display: block;
            position: relative;
            width: 120px;
            padding: 10px;
            font-size: 16px;

            text-decoration: none;
            color: #ffffff;
            font-weight: bold;
            border: 3px solid #1e90ff;
            border-radius: 10px;
        }
        .box li a:hover {
            background-color: #1e90ff;
        }
        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }

        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }
        .box-search {
            display: none;
        }
    </style>
</head>
<body>
    <h1>Venha competir e mostrar suas capacidades intelectuais!</h1>
    <div class="box">
        <li><a href="login.php">Login</a></li>
        <li><a href="formulario.php">Cadastre-se</a></li>
    </div>

    <br>
    <?php
        echo "<h1>Resultado Checkers</h1>";
    ?>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col"><a>Jogador</a></th>
                    <th scope="col"><a>Ponto Dama</a></th>
                    <th scope="col"><a>Ponto Resposta</a></th>
                    <th scope="col"><a>Pontuação Total</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result)) {
                        
                        $totalPontos = $user_data['dama'] + $user_data['resposta'];

                        echo "<tr>";
                        echo "<td>".$user_data['nome']."</td>";
                        echo "<td>".$user_data['dama']."</td>";
                        echo "<td>".$user_data['resposta']."</td>";
                        echo "<td>".$totalPontos."</td>";
                        echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>