<?php	// salvar como gravarDadosFunc.php
	$codigo          			= $_POST["codigo"];
	$nome            			= $_POST["nome"];
	$sobrenome       			= $_POST["sobrenome"];
	$dataNascimento  			= $_POST["dataNascimento"];
	$sexo            			= $_POST["sexo"];
	$rg              			= $_POST["rg"];
	$cpf             			= $_POST["cpf"];
	$estadoCivil     			= $_POST["estadoCivil"];
	$endereco        			= $_POST["endereco"];
	$bairro          			= $_POST["bairro"];
	$cidade          			= $_POST["cidade"];
	$estado          			= $_POST["estado"];
	$cep             			= $_POST["cep"];
	$telefone        			= $_POST["telefone"];
	$celular         			= $_POST["celular"];
	$email           			= $_POST["email"];
	$cargo           			= $_POST["cargo"];		
	$dataAdmissao      			= $_POST["dataAdmissao"];
	$instrucao                  = $_POST ["instrucao"];
	$obs         				= $_POST["obs"];
	$documentoNovo				= $_FILES["documentoNovo"]["name"];
		
	echo "Gravando dados do funcion&#x000E1;rio <b>$nome</b>..<br>";
	include "conect.php";
	$comandoSQL="UPDATE funcionarios SET 	
			codigo = '$codigo',
			nome = '$nome',
			sobrenome = '$sobrenome',
			dataNascimento = '$dataNascimento',
			sexo = '$sexo',
			rg = '$rg',
			cpf = '$cpf',
			estadoCivil = '$estadoCivil',
			endereco = '$endereco',
			bairro = '$bairro',
			cidade = '$cidade',
			estado = '$estado',
			cep = '$cep',
			telefone = '$telefone',
			celular = '$celular',
			email = '$email',
			cargo = '$cargo',
			dataAdmissao = '$dataAdmissao',
			instrucao = '$instrucao',
			obs = '$obs' ";
			
			
	if($documentoNovo<>"")		
		$comandoSQL = $comandoSQL . ", documento='$documentoNovo' ";
	
	$comandoSQL = $comandoSQL . " WHERE codigo='$codigo'";
	
	// Abrindo a conexão e o banco
	include "conect.php";
	
	// Chegou novo documento?
	if($documentoNovo<>"")
	{
		// chegou - transferir o documento que chegou
		$nomeTemporario=$_FILES["documentoNovo"]["tmp_name"];
		
		$destino="documentos/$documentoNovo" ;
		
		if( move_uploaded_file ($nomeTemporario,
							$destino) )
			echo "Arquivo $destino recebido com sucesso!";
		else
			die("Erro no recebimento do arquivo do 
		documento:" . $_FILES["documentoNovo"]["error"] );
	}
	
	// Gravando os dados no banco
	mysqli_query($conect, $comandoSQL) or 
	 die("Erro na altera&#x000E7;&#x000E3;o de dados:" .
		mysqli_error($conect));
	
	echo "O funcion&#x000E1;rio <b>$nome</b> alterado com sucesso!";
?>
<hr>
Clique <a href="listagemFunc.php">aqui</a> para continuar.