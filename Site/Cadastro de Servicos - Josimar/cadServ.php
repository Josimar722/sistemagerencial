<?php
	// Criar variaveis
	$NomeServico    = $_POST["NomeServico"];
	$Pago           = $_POST["Pago"];
	$Atendidopor    = $_POST["Atendidopor"];                            
	$NomeCliente    = $_POST ["NomeCliente"]; 
	$Tipo			= $_POST["tipo"];
	$Total		    = $_POST["total"];
	$ConcluiuServico= $_POST["ConcluiuServico"];
	$ValorServico   = (int) $_POST["ValorServico"];
	$NomeFuncionario= $_POST["NomeFuncionario"];
	
	
				   
	$NomeServico="NomeServico";
	if ( isset($_POST["NomeServico"])  )
		$NomeServico =  $_POST["NomeServico"];
    
	$Pago="Pago";
	if ( isset($_POST["Pago"])  )
		$Pago =  $_POST["Pago"];
	
	$Atendidopor="Atendidopor";
	if ( isset($_POST["Atendidopor"])  )
		$Atendidopor =  $_POST["Atendidopor"];
	
	$NomeCliente="NomeCliente";
	if ( isset($_POST["NomeCliente"])  )
		$NomeCliente =  $_POST["NomeCliente"];
	
	$Tipo="tipo";
	if ( isset($_POST["tipo"])  )
		$Tipo =  $_POST["tipo"];
	
	$Total="total";
	if ( isset($_POST["total"])  )
		$Total =  $_POST["total"];
	
	$ConcluiuServico="ConcluiuServico";
	if ( isset($_POST["ConcluiuServico"])  )
		$ConcluiuServico =  $_POST["ConcluiuServico"];
	
	$ValorServico="ValorServico";
	if ( isset($_POST["ValorServico"])  )
		$ValorServico =  $_POST["ValorServico"];

	$NomeFuncionario="NomeFuncionario";
	if ( isset($_POST["NomeFuncionario"])  )
		$NomeFuncionario =  $_POST["NomeFuncionario"];
	
	$DatadaVisita	    = $_POST["DatadaVisita"];		
	$obs               = $_POST["obs"];
	$Foto			= $_FILES["Foto"]["name"];
	$tamanho		= $_FILES["Foto"]["size"];
	$tipoArquivo	= $_FILES["Foto"]["type"];
	$nomeTemporario	= $_FILES["Foto"]["tmp_name"];
  
	
	
	
	// validar dados
	if ( strlen($NomeServico) <2 )
		die("Informe o nome do serviço, com no minimo 2 caracteres.");
	
	if (  ($Pago <> "Sim") and ($Pago <> "Não")  )
		die("Situação pago,informado incorretamente.");
	
	if ( strlen($Atendidopor) <2 )
		die("Informe o nome do atendente, com no minimo 2 caracteres.");
	
	if ( strlen($NomeCliente) <2 )
		die("Informe o nome o nome do cliente, com no minimo 2 caracteres.");
	
	if ( strlen($NomeFuncionario) <2 )
		die("Informe o nome do funcionário,com no minimo 2 caracteres.");

	if ( $Tipo == "")
		die("Tipo deve ser informado");

	if ($Total <= 0)

		if ($foto=="")
		die("Foto do Pet é obrigatória.");
	
	
	// exibir dados
	echo "<h2>Dados Recebidos</h2>";
	echo "Nome do Servico: $NomeServico<br>";
	echo "Pago: $Pago<br>";
	echo "Atendido por: $Atendidopor<br>";
	echo "Nome do Cliente:  $NomeCliente<br>";
	echo "Tipo: $Tipo<br>";
	echo "Total: $Total <br>";
	echo "Concluiu o Servico: $ConcluiuServico<br>";
	echo "ValorServico:  $ValorServico<br>";
	echo "Nome do Funcionario: $NomeFuncionario<br>";
	echo "Data da Visita: $DatadaVisita<br>";
    echo "TipoArquivo: $tipoArquivo<br>";
	echo "NomeTemporario: $nomeTemporario<br>";	
	echo "Observacoes: $obs<br>";
	echo "<hr>";
	echo "Recebendo os Dados Fornecidos...<br>";
	echo "<hr>";
	echo "Recebendo o arquivo de Foto...<br>";
	
	if ( ($Foto !== "") and ($tamanho > 0))
		
	{
	  $destino ="Foto/$Foto";
	  
	if (move_uploaded_file($nomeTemporario, $destino))
	
	echo "Sucesso B-) <br>";
	
	  else
		  echo"Falhou:  " . $_FILES["Foto"] ["error!"];
	  
	}
	
	  echo "<hr>";
	  echo "1-Conectando ao Mysql (localhost).....<br>";
	  
	$con = mysqli_connect("localhost" , "root", "" );
	
	 echo "2-Abrindo o banco...<br>";
	 
	mysqli_select_db($con , "salaoDeBeleza") or die ("Erro na seleção do banco.". mysqli_error($con));
	
	echo"OK - Banco aberto. <br>";
	
	$sql ="Insert Into servicos
	
	(NomeServico,Pago,AtendidoPor,NomeCliente,Tipo,Total,ConcluiuServico,ValorServico,NomeFuncionario,DatadaVisita,foto,obs)
	
	Values('$NomeServico','$Pago','$Atendidopor','$NomeCliente','$Tipo','$Total','$ConcluiuServico','$ValorServico','$NomeFuncionario','$DatadaVisita','$Foto','$obs')";
	
	//echo $sql;
	
	echo "<hr>";
	
	echo "Agora vou rodar o comando insercao <br>";
	
	mysqli_query($con, $sql) or die ("Erro na inclusão do Serviço:" . mysqli_error($con) );
	
	
?>
<br><br><h2>Clique <a href='cadServ.html'>aqui </a> para continuar.</h2>