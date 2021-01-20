<?php
     
	
	$codigo="codigo";
	if ( isset($_POST["codigo"])  )
		$codigo =  $_POST["codigo"];
	$nome    = $_POST["nome"];
	$Pago           = $_POST["Pago"];                           
	$NomeCliente    = $_POST ["NomeCliente"]; 
	$DatadaVisita	    = $_POST["DatadaVisita"];	
	$documentoNovo    	   = $_FILES["documentoNovo"]["name"];
	
	if($documentoNovo<>"")		
		$sql = $sql . ", documento='$documentoNovo' ";
						  
						 
						$sql = $sql . " WHERE codigo=$codigo";
	
		include "conexao.php";

		if($documentoNovo<>"")
	{
		// chegou - transferir a foto que chegou
		$nomeTemporario=$_FILES["documentoNovo"]["tmp_name"];
		
		$destino="documento/$documentoNovo" ;
		
		if( move_uploaded_file ($nomeTemporario,
							$destino) )
			echo "Arquivo $destino recebido com sucesso!<br>";
		else
			die("Erro no recebimento do arquivo do 
			  documento:" . $_FILES["documentoNovo"]["error"] );
	}
	
	$NomeServico="NomeServico";
	if ( isset($_POST["NomeServico"])  )
		$NomeServico =  $_POST["NomeServico"];
    
	$Pago="Pago";
	if ( isset($_POST["Pago"])  )
		$Pago =  $_POST["Pago"];
	
	
	$NomeCliente="NomeCliente";
	if ( isset($_POST["NomeCliente"])  )
		$NomeCliente =  $_POST["NomeCliente"];
	   
	
	
	echo "Gravando dados do Serviço <b>$codigo</b>..<br>";
	include "conexao.php";
	$sql="UPDATE produtos SET
	codigo='$codigo',
	preco='$preco',
	custo='$custo',
	estoque='$estoque'";
	
	
	$sql = $sql . " WHERE codigo='$codigo'";
		
	
	// Abrindo a conexÃ£o e o banco
	include "conexao.php";
	
	
	// Gravando os dados no banco
	mysqli_query($conexao, $sql) or 
	 die("Erro na altera&#x000E7;ão de dados:" .
		mysqli_error($conexao));
	
	echo "O <b>$codigo</b> foi alterado com sucesso!";
?>
<hr>
Clique <a href="produto.html">aqui</a> para continuar.