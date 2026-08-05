<?php
/**
 * Desafio Integrador - Exibição dos Dados
 * Só acessível com login ativo E cadastro já preenchido.
 */
session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION['cadastro'])) {
    header("Location: cadastro.php");
    exit;
}

$dados = $_SESSION['cadastro'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Desafio Integrador - Dados Cadastrados</title>
</head>
<body>
    <h1>Dados Cadastrados</h1>
    <p>Logado como: <strong><?= htmlspecialchars($_SESSION['usuario_logado']) ?></strong> | <a href="logout.php">Sair</a></p>

    <table border="1" cellpadding="8">
        <tr><th>Campo</th><th>Valor</th></tr>
        <tr><td>Nome</td><td><?= htmlspecialchars($dados['nome']) ?></td></tr>
        <tr><td>E-mail</td><td><?= htmlspecialchars($dados['email']) ?></td></tr>
        <tr><td>Idade</td><td><?= htmlspecialchars($dados['idade']) ?></td></tr>
        <tr><td>Cidade</td><td><?= htmlspecialchars($dados['cidade']) ?></td></tr>
    </table>

    <p><a href="cadastro.php">Fazer novo cadastro</a></p>
</body>
</html>
