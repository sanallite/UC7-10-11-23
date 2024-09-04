<?php
    session_start();

    if ( $_SESSION ) {
        session_destroy();
        echo "Sessão encerrada."; ?>
        <a href="index.php">Voltar para a página de entrada.</a>
    <?php }

    else {
        echo "Nada para exibir.";
    }
?>
