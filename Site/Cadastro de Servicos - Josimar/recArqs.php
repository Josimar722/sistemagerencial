<?php
    // 1 - recebendo os dados em variáveis
    $nomeArqFoto 	 = $_FILES["foto"]["name"];
    $tipoArqFoto	 = $_FILES["foto"]["type"]; 
    $tamanhoArqFoto	 = $_FILES["foto"]["size"]; 
    $nomeTempArqFoto = $_FILES["foto"]["tmp_name"]; 

    $nomeArqFicha 	 = $_FILES["ficha"]["name"];
    $tipoArqFicha 	 = $_FILES["ficha"]["type"]; 
    $tamanhoArqFicha = $_FILES["ficha"]["size"]; 
    $nomeTempArqFicha= $_FILES["ficha"]["tmp_name"]; 

 // 2 – exibindo os dados recebidos (dos arquivos)
    echo "<h2>Dados Recebidos</h2>";
    echo "Arquivo da Foto: $nomeArqFoto <br>";
    echo "Tamanho do arquivo: $tamanhoArqFoto <br>";
    echo "Tipo do arquivo: $tipoArqFoto <br>";
    echo "Nome do arquivo temporário: $nomeTempArqFoto";
    echo "<hr>";

    echo "Arquivo da Ficha: $nomeArqFicha <br>";
    echo "Tamanho do arquivo: $tamanhoArqFicha <br>";
    echo "Tipo do arquivo: $tipoArqFicha <br>";
    echo "Nome do arquivo temporário: $nomeTempArqFicha <br>";

	/* 3 – Transferência dos arquivos da pasta temporária para a  
	pasta criada arquivos. Arquivo da foto veio? 
	Vamos conferir. Não queremos transferir algo que não veio.
	*/
	if( ($nomeArqFoto <> "") and ($tamanhoArqFoto > 0) )
	{
		$destino = "arquivos/" . $nomeArqFoto ;
		if (move_uploaded_file ($nomeTempArqFoto , $destino ) )
			echo "Arquivo da Foto recebido com sucesso<br>";
		else
			echo "Erro no recebimento do arquivo da Foto :" . 
				  $_FILES["foto"]["error"];
	}
	
	if( ($nomeArqFicha <> "") and ($tamanhoArqFicha > 0) )
	{
		$destino = "arquivos/" . $nomeArqFicha;
		if (move_uploaded_file ($nomeTempArqFicha, $destino ) )
			echo "Arquivo da Ficha recebido com sucesso<br>";
		else
			echo "Erro no recebimento do arquivo da Ficha :" . 
				  $_FILES["foto"]["error"];
	}

?>
