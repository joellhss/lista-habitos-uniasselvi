<?php
    require "./scr/Habitos.php";
    $conexao = new Habitos();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="style/style.css">
        <title>Lista de hábitos</title>
    </head>
    <body>
        <div class="main jumbotron bg-light">
            <h1>Lista de hábitos</h1>
            <p>Cadastre aqui os hábitos que você tem que vencer para melhorar sua vida!</p>

            <table class="table table-striped">
                <?php
                if ($conexao->verificaStatus("A") > 0) {
                    $conexao->buscarTabela("A");
                } else {
                    echo "<tr>Você ainda não possui hábitos cadastrados aqui!</tr>";
                }
                ?>
            </table>
        </div>

        <div class="main jumbotron bg-light">
            <p>Continue mudando sua vida!</p>
            <p>Cadastre mais hábitos!</p>

            <a class="btn btn-success" href="novohabito.php">Cadastrar Hábito</a>
        </div>


            <?php
                if($conexao->verificaStatus('V') > 0) {
                    echo "<div class='main jumbotron bg-light'> <h2>Hábitos vencidos</h2>" ?>
            <table class="table table-striped">
                    <?php $conexao->buscarTabela("V"); ?>
            </table>
                    </div>
            <?php
                }
            ?>



            <?php
                if($conexao->verificaStatus('D') > 0) {
                    echo "<div class='main jumbotron bg-light'><h2>Hábitos desistidos</h2>" ?>
            <table class="table table-striped">
                    <?php $conexao->buscarTabela("D"); ?>
            </table>
                    </div>
            <?php
                }
            ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>