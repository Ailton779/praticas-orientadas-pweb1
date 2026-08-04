<?php
/**
 * Área restrita - só acessível com sessão ativa.
 */
session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Área Restrita</title>
</head>
<body>
    <h1>Área Restrita</h1>
    <p>Bem-vindo(a), <strong><?= htmlspecialchars($_SESSION['usuario_logado']) ?></strong>!</p>
    <p>Você está vendo esta página porque fez login com sucesso.</p>

    <a href="logout.php">Sair</a>
</body>
</html>
