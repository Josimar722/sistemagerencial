<?php
session_start();

//Incluindo a conexão com banco de dados
    include_once("conexao.php");

//O campo usuário e senha preenchido entra no if para validar
if((isset($_POST['email'])) && (isset($_POST['senha']))){
    $usuario = mysqli_real_escape_string($conexao, $_POST['email']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
        // Criptrografando senha para md5
        //$senha = md5($senha);

    //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
    //$sql = "SELECT * FROM usuarios WHERE email = '$usuario' && senha ='$senha' LIMIT 1";
    //$result = mysqli_query($conexao, $sql);
    //$resultado = mysqli_fetch_assoc($result);

    if(($senha == "admin") && ($usuario == "admin")){
        header("Location:../Caixa%20-%20Deivid/caixa.php");
        }else{//Váriavel global recebendo a mensagem de erro
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
            header("Location:../index.php");
    }

    //O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
    }else{
        $_SESSION['loginErro'] = "Usuário ou senha inválido";
        header("Location:../index.php");
        }
?>