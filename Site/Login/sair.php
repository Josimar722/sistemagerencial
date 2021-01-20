 <?php
    session_start();
    //session_destroy();  // Destruindo todas as variaveis globais do site

    unset(
        $_SESSION['usuarioId'],
        $_SESSION['usuarioNome'],
        $_SESSION['usuarioEmail'],
        $_SESSION['usuarioSenha']
    );

    // Redirecionando o usuario para a pagina de login
    header("Location:../index.php");
?>