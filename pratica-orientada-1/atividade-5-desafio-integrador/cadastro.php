<?php
/**
 * Desafio Integrador - Cadastro
 * Só acessível após login. Valida e salva os dados na sessão.
 */
session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: login.php");
    exit;
}

$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = [
        'nome'   => trim($_POST['nome'] ?? ''),
        'email'  => trim($_POST['email'] ?? ''),
        'idade'  => trim($_POST['idade'] ?? ''),
        'cidade' => trim($_POST['cidade'] ?? ''),
    ];

    if (empty($dados['nome']) || strlen($dados['nome']) < 3) {
        $erros[] = "Nome é obrigatório e deve ter pelo menos 3 caracteres.";
    }

    if (empty($dados['email']) || !filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
        $erros[] = "E-mail é obrigatório e deve ser válido.";
    }

    if (empty($dados['idade']) || !ctype_digit($dados['idade']) || (int) $dados['idade'] < 1 || (int) $dados['idade'] > 120) {
        $erros[] = "Idade é obrigatória e deve ser um número entre 1 e 120.";
    }

    if (empty($dados['cidade'])) {
        $erros[] = "Cidade é obrigatória.";
    }

    if (empty($erros)) {
        // Salva o cadastro na sessão, associado ao usuário logado
        $_SESSION['cadastro'] = $dados;
        header("Location: dados.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Desafio Integrador - Cadastro</title>
</head>
<body>
    <h1>Cadastro</h1>
    <p>Logado como: <strong><?= htmlspecialchars($_SESSION['usuario_logado']) ?></strong> | <a href="logout.php">Sair</a></p>

    <?php if (!empty($erros)): ?>
        <ul style="color: red;">
            <?php foreach ($erros as $erro): ?>
                <li><?= htmlspecialchars($erro) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="POST" action="cadastro.php">
        <label for="nome">Nome completo:</label><br>
        <input type="text" name="nome" id="nome"><br><br>

        <label for="email">E-mail:</label><br>
        <input type="text" name="email" id="email"><br><br>

        <label for="idade">Idade:</label><br>
        <input type="text" name="idade" id="idade"><br><br>

        <label for="cidade">Cidade:</label><br>
        <input type="text" name="cidade" id="cidade"><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <?php if (isset($_SESSION['cadastro'])): ?>
        <p><a href="dados.php">Ver último cadastro salvo</a></p>
    <?php endif; ?>
</body>
</html>
