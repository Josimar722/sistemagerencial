<?php
	
	$codigo			= (int) $_POST["codigo"];
	$cpf			= $_POST["cpf"];
	$nome			= $_POST["nome"];
	$dataNascimento	= $_POST["dataNascimento"];
	$sexo			= $_POST["sexo"];
	$endereco		= $_POST["endereco"];
	$numero			= (int) $_POST["numero"];
	$bairro			= $_POST["bairro"];
	$cep			= $_POST["cep"];
	$email			= $_POST["email"];
	$telefone		= $_POST["telefone"];
	$celular		= $_POST["celular"];
	$obs			= $_POST["obs"];
	$documentoNovo    	   = $_FILES["documentoNovo"]["name"];
	
	
	
	include "conexao.php";	
	$sql="UPDATE clientes SET 
						  
						  cpf='$cpf',
						  nome='$nome',
						  dataNascimento='$dataNascimento',
						  sexo='$sexo',
						  endereco='$endereco',
						  numero='$numero',
						  bairro='$bairro',
						  cep='$cep',
						  email='$email',
						  telefone='$telefone',
						  celular='$celular',
						  obs='$obs'";
						  
						  
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
			
		mysqli_query($conexao, $sql) or die ("Erro na alteração de dados:" . 
		mysqli_erro($conexao));
		echo "Cliente <b>$nome</b> alterado com sucesso!";
?>
<br><hr>
<h2>Clique <a href="listagemCliente.php"> aqui </a>para continuar!</h2>
