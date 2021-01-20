<?php
	// Criar variáveis
	
	$nomeCliente		= $_POST["nomeCliente"];
	$nomeServico		= $_POST["nomeServico"];
	$dataAgendamento	= $_POST["dataAgendamento"];
	$horaAgendamento	= $_POST["horaAgendamento"];
	$obs				= $_POST["obs"];
	
	$documento		= $_FILES["documento"]["name"];
	$tamanho		= $_FILES["documento"]["size"];
	$tipoArquivo	= $_FILES["documento"]["type"];
	$nomeTemporario	= $_FILES["documento"]["tmp_name"];
		
		// validar dados
	if ( strlen($nomeCliente) <2 )
		die("Informe nome com no mínimo 2 caracteres.");
	
	if ( $nomeServico == "")
		die("Servi&#x000E7;o deve ser informado");

		
	// exibir dados
	echo "<h2>Dados Recebidos</h2>";

	echo "nomeCliente: <b>$nomeCliente</b> <br>";
	echo "nomeServico: $nomeServico<br>";
	echo "dataAgendamento: $dataAgendamento<br>";
	echo "Hora Agendamento: $horaAgendamento <br>";
	echo "Observacoes:<br>";
	echo "$obs<br>";
	
	echo "Documento: $documento<br>";
	echo "tamanho: $tamanho<br>";
	echo "tipoArquivo: $tipoArquivo<br>";
	echo "nomeTemporario: $nomeTemporario<br>";

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
	
	// 1 - Conectando no MYSQL (endereço: localhost)
	echo "<hr>";
	echo "1-Conectando no MYSQL (localhost)...<br>";
	
	$con = mysqli_connect(	"localhost" , 
							"root", 
							"" );
							
	echo "2-Abrindo o banco ....<br>";
	
	mysqli_select_db( $con , "salaoDeBeleza") or 
		die("Erro na sele&#x000E7;&#x000E3;o do banco:" .
				mysqli_error($con) );
				
	echo "OK - Banco aberto. <br>"	;
	
	
	$sql = "INSERT INTO agendamentos 
	(	nomeCliente,     nomeServico,    dataAgendamento,    horaAgendamento, 	obs, documento )
	VALUES (
		'$nomeCliente', '$nomeServico', '$dataAgendamento', '$horaAgendamento', '$obs', '$documento' )" ;
		
	//echo $sql ; // exibindo a variável na tela
	echo "<hr>";
		
	mysqli_query($con, $sql) 
		or die("Erro na inclus&#x000E3;o do Agendamento:" .
			mysqli_error($con) );
		
	echo "Cadastro do Agendamento <b>$nomeCliente</b> finalizado!";

?>
Clique <a href='listagemAgendamentos.php'>aqui</a> para continuar.