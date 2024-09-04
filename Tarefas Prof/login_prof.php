<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="card.css" rel="stylesheet">
</head>
<body>
    <nav class="menu">
        <a href="#">Task Manager</a>
    </nav>
    <div class="card">
        <div class="card_interno">
            <div class="card_inicio">
                Login
            </div>
        <div class="card_body">
            <form action="processa_login.php" method="post">
                <div class="form_group">
                    <input type="email" name="email" placeholder="E-mail">
                    <input type="password" name="senha" placeholder="Senha">
                </div>

                <?php if(isset($_GET['login'])=='erro') {?>
                <div class="texto_erro">
                    E-mail ou Senha invalido(s).
                </div>    
                <?php } ?>
                <input type="submit" value="Login">        
            </form>
            <br>
            <a href="menu.php">Convidado</a>
        </div>
        
    </div>
</div>
    
</body>
</html>