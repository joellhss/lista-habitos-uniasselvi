<?php

require "./scr/Habitos.php";

$conexao = new Habitos();
$resultado = $conexao->atualizaHabito($_GET['id'], "D");
if($resultado > 0) {
    header("Location: index.php");
} else {
    echo "<h1>Não foi possível concluir esta operação!<br>Tente novamente!<h1><br><a href='./index.php'>Voltar</a>";
}