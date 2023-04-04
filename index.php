<?php
session_start();

if(isset($_SESSION['usuario'])){
    header('Location: tarefas.php');
    exit();
}

if(isset($_POST['usuario']) && isset($_POST['senha'])){
    $usuarios = array(
        'usuario1' => 'senha1',
        'usuario2' => 'senha2'
    );

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    if(isset($usuarios[$usuario]) && $usuarios[$usuario] == $senha){
        $_SESSION['usuario'] = $usuario;
        header('Location: tarefas.php');
        exit();
    }else{
        $erro = "Usuário ou senha incorretos";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Tarefas - Login</title>
</head>
<body>
    <h1>Sistema de Tarefas</h1>
    <?php if(isset($erro)){ echo "<p>$erro</p>"; } ?>
    <form method="POST">
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>
