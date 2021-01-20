<?php
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
	$cadastrado		= $_POST["cadastrado"];
	$obs			= $_POST["obs"];
	
	$documento		= $_FILES["documento"]["name"];
	$tamanho		= $_FILES["documento"]["size"];
	$tipoArquivo	= $_FILES["documento"]["type"];
	$nomeTemporario	= $_FILES["documento"]["tmp_name"];
			
	if ( strlen($nome) <2 )
		die("<h2>Informe um nome com no minimo 2 caracteres.</h2>");
	
	if (  ($sexo <> "M") and ($sexo <> "F")  )
		die("Sexo informado incorretamente.");
	
	echo "<h2>Dados Recebidos</h2>";
	echo "CPF: $cpf<br>";
	echo "Nome: $nome <br>";
	echo "Data de Nascimento: $dataNascimento<br>";
	echo "Sexo: $sexo<br>";
	echo "End.: $endereco<br>";
	echo "N&#x000B0;: $numero<br>";
	echo "Bairro: $bairro <br>";
	echo "CEP: $cep <br>";
	echo "E-mail:  $email<br>";
	echo "Telefone:  $telefone<br>";
	echo "Celular: $celular<br>";
	echo "Cliente cadastrado em: $cadastrado<br>";
	echo "Observa&#x000E7;&#x000F5;es: $obs<br>";
	
	echo "Documento: $documento<br>";
	echo "Tamanho: $tamanho<br>";
	echo "TipoArquivo: $tipoArquivo<br>";
	echo "NomeTemporario: $nomeTemporario<br>";

	// transferir o documento que chegou
	if($documento<>"")
	{
		// chegou - transferir a foto que chegou
		$nomeTemporario=$_FILES["documento"]["tmp_name"];
		
		$destino="documento/$documento" ;
		
		if( move_uploaded_file ($nomeTemporario,
							$destino) )
			echo "Arquivo $destino recebido com sucesso!";
		else
			die("Erro no recebimento do arquivo do 
			  documento:" . $_FILES["documento"]["error"] );
	}
	
	echo "<hr>";
		
	include "conexao.php";

	$sql = "INSERT INTO clientes 
	(	cpf,	nome,     dataNascimento,	
		sexo,    endereco,    numero, 
		bairro,  cep,  email,   telefone, 
		celular,     cadastrado, obs, documento)
	VALUES (
		'$cpf',
		'$nome', '$dataNascimento','$sexo', '$endereco', '$numero', 
		'$bairro','$cep', '$email', '$telefone', 
		'$celular', '$cadastrado','$obs', '$documento' )" ;
	
	mysqli_query($conexao, $sql) 
		or die("Erro na inclusão do Cliente:" .
			mysqli_error($conexao) );
		
	echo "Cadastro do cliente <b>$nome</b> finalizado com sucesso!<br><br>";

?>
<h2>Clique <a href='listagemCliente.php'>aqui </a> para continuar.</h2>