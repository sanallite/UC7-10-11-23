<?php
    session_start();
    /* Iniciando a sessão. */

    unset( $_SESSION['usuario'] );
    unset( $_COOKIE['PHPSESSID'] );
    /* Eliminando os valores das variáveis globais sessão e cookie, para efetivamente fazer o logout. */

    setcookie ('PHPSESSID', null, -1, '/');
    /* Colocando um valor nulo no cookie da sessão, para limpá-lo completamente. */

    session_destroy();
    /* Encerrando a sessão. */

    header("location:login.php");
    /* Redirecionado o usuário para a página de login. */
?>