<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header('Location: index.php');
    exit();
}

if(isset($_POST['titulo']) && isset($_POST['descricao']) && isset($_POST['data']) && isset($_POST['prioridade'])){
    $tarefa = array(
        'titulo' => $_POST['titulo'],
        'descricao' => $_POST['descricao'],
        'data' => $_POST['data'],
        'prioridade' => $_POST['prioridade'],
        'concluida' => false
    );

    $_SESSION['tarefas'][] = $tarefa;
}

if(isset($_GET['concluir'])){
    $index = $_GET['concluir'];
    $_SESSION['tarefas'][$index]['concluida'] = true;
}

if(isset($_GET['excluir'])){
    $index = $_GET['excluir'];
    unset($_SESSION['tarefas'][$index]);
    $_SESSION['tarefas'] = array_values($_SESSION['tarefas']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Tarefas - Tarefas</title>
</head>
<body>
    <h1>Sistema de Tarefas</h1>
    <h2>Olá, <?php echo $_SESSION['usuario']; ?></h2>
    <form method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" required></textarea>

        <label for="data">Data de Conclusão:</label>
        <input type="date" name="data" required>

        <label for="prioridade">Prioridade:</label>
        <select name
