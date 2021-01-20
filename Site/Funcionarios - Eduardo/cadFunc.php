<?php
	//Variáveis
	
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
	$dataAdmissao      			= $_POST["dataAdmissao"];
	$cargo           			= $_POST["cargo"];
	$instrucao                  = $_POST["instrucao"];
	$obs         				= $_POST["obs"];
	
//Variáveis documento
	$documento			= $_FILES["documento"]["name"];
	$tamanho			= $_FILES["documento"]["size"];
	$tipoArquivo		= $_FILES["documento"]["type"];
	$nomeTemporario		= $_FILES["documento"]["tmp_name"];
	
	//Validar dados
	if(strlen ($nome) < 3) 
		die("Informe nome com no mínimo 3 caracteres.");
	
	if(strlen ($sobrenome) < 5) 
		die("Informe o sobrenome com no mínimo 5 caracteres.");
	
	if($sexo == "")
		die("Informe o Sexo do funcion&#x000E3;rio");
	
	if($estadoCivil == "")
		die("Informe o Estado Civil do funcion&#x000E3;rio");
	
	if($cidade == "")
		die("Informe a Cidade do funcion&#x000E3;rio");
	
	if($cargo == "")
		die("Informe o cargo do funcion&#x000E3;rio");
	
	if ($documento=="")
		die("Documento do Funcion&#x000E3;rio é obrigatório.");
	
	//Exibir dados
	echo "<h2>Dados Recebidos<h2>";
	
	echo "nome = $nome <br>";
	echo "sobrenome = $sobrenome <br>";
	echo "dataNascimento = $dataNascimento <br>";
	echo "sexo = $sexo <br>";
	echo "rg = $rg <br>";
	echo "cpf = $cpf <br>";
	echo "estadoCivil = $estadoCivil <br>";
	echo "endereco = $endereco <br>";
	echo "bairro = $bairro <br>";
	echo "estado = $estado <br>";
	echo "cep = $cep <br>";
	echo "telefone = $telefone<br>";
	echo "celular = $celular<br>";
	echo "email = $email<br>";
	echo "dataAdmissao = $dataAdmissao<br>";
	echo "cargo = $cargo <br>"; 
	echo "instrucao = $instrucao <br>";
	echo "documento: $documento<br>";
	echo "tamanho: $tamanho<br>";
	echo "tipoArquivo: $tipoArquivo<br>";
	echo "nomeTemporario: $nomeTemporario<br>";
	echo "obs = $obs <br>";
	echo "<hr>";
	echo "Recebendo os Dados Fornecidos...<br>";
	
	  echo "<hr>";
	  echo "1-Conectando ao Mysql (localhost).....<br>";
	  
	include "conect.php";
	
	 echo "2-Abrindo o banco...<br>";
	
	echo"OK - Banco aberto. <br>";
	
	$comandoSQL = "INSERT INTO funcionarios
	(nome, sobrenome, dataNascimento, sexo, rg, cpf, estadoCivil, endereco, bairro, estado, cep, 
	telefone, celular, email, dataAdmissao, cargo, documento,  obs, instrucao)
	VALUES 
	('$nome','$sobrenome','$dataNascimento','$sexo','$rg','$cpf',
	'$estadoCivil','$endereco','$bairro','$estado','$cep','$telefone','$celular','$email','$dataAdmissao',
	'$cargo','$documento','$obs', '$instrucao')";
//die ($comandoSQL);
	
	echo "<hr>";
	
	echo "Agora vou rodar o comando inser&#x000E7;&#x000E3;o <br>";
	
	mysqli_query($conect, $comandoSQL) or die ("Erro na inclus&#x000E3;o do Servi&#x000E7;o:" . mysqli_error($conect) );

?>
Clique <a href="listagemFunc.php">aqui</a> para continuar... 