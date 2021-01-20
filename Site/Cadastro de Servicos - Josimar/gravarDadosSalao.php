<?php
     
	
	$codigo="codigo";
	if ( isset($_POST["codigo"])  )
		$codigo =  $_POST["codigo"];
	$NomeServico    = $_POST["NomeServico"];
	$Pago           = $_POST["Pago"];                           
	$NomeCliente    = $_POST ["NomeCliente"]; 
	$DatadaVisita	    = $_POST["DatadaVisita"];	
	$Atendidopor  = $_POST["Atendidopor"] ;
	$total  = $_POST["total"] ;
	$obs  = $_POST["obs"] ;
	$Nomefuncionario  = $_POST["NomeFuncionario"] ;
	$tipo  = $_POST["tipo"] ;
  
				   
	$NomeServico="NomeServico";
	if ( isset($_POST["NomeServico"])  )
		$NomeServico =  $_POST["NomeServico"];
    
	$Pago="Pago";
	if ( isset($_POST["Pago"])  )
		$Pago =  $_POST["Pago"];
	
	
	$NomeCliente="NomeCliente";
	if ( isset($_POST["NomeCliente"])  )
		$NomeCliente =  $_POST["NomeCliente"];
	   
	
	
	echo "Gravando dados do Servi&#x000E7;o <b>$codigo</b>..<br>";
	include "conexao.php";
	$sql="UPDATE servicos SET
	NomeServico='$NomeServico',
	Pago='$Pago',
	NomeCliente='$NomeCliente',
	DatadaVisita='$DatadaVisita',
	AtendidoPor='$Atendidopor',
	Total='$total',
	obs='$obs',
	Nomefuncionario  = '$Nomefuncionario',
	Tipo  = '$tipo'";
	
	$sql = $sql . " WHERE codigo='$codigo'";
	//die ($sql);
	include "conexao.php";
	
	// Chegou nova foto?
	
	
	// Gravando os dados no banco
	mysqli_query($conexao, $sql) or 
	 die("Erro na alteracao de dados:" .
		mysqli_error($conexao));
	
	echo "O <b>$codigo</b> foi alterado com sucesso!";
?>
<hr>
Clique <a href="listagemSalao.php">aqui</a> para continuar.
