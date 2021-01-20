<?php

if( ! isset($_GET["c"])	)
    die("Rotina chamada de forma incorreta!");

$id = $_GET["c"];
echo "Excluindo Movimento código <b>$id</b>	<hr>";

include "conexao.php";

//Comando para exclusÃ£o...

$comando="DELETE FROM movimento WHERE id=$id";
mysqli_query($conexao, $comando)	or
die("Erro na eliminação dos registros:"	.
    mysqli_error($conexao));

echo "<script>window.location='../caixa.php';alert('Movimento $id Eliminado com Sucesso! Click em ok para retornar');</script>";
?>
