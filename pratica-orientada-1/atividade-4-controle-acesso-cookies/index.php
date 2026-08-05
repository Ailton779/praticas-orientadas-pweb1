<?php
/**
 * Atividade 4 - Controle de Acesso com Cookies
 * Armazena o nome do usuário em um cookie por 7 dias.
 */

const NOME_COOKIE = "nome_usuario";
const DIAS_EXPIRACAO = 7;

// ---------- AÇÃO: ESQUECER USUÁRIO ----------
if (isset($_GET['esquecer'])) {
    // Remove o cookie definindo uma expiração no passado
    setcookie(NOME_COOKIE, '', time() - 3600, "/");
    header("Location: index.php");
    exit;
}

// ---------- AÇÃO: SALVAR NOVO NOME ----------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nome'])) {
    $nome = trim($_POST['nome']);
    setcookie(NOME_COOKIE, $nome, time() + (DIAS_EXPIRACAO * 24 * 60 * 60), "/");
    // Atualiza a variável local também, já que o cookie só chega no PRÓXIMO request
    $_COOKIE[NOME_COOKIE] = $nome;
}

$usuarioConhecido = isset($_COOKIE[NOME_COOKIE]) && !empty($_COOKIE[NOME_COOKIE]);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 4 - Controle de Acesso com Cookies</title>
</head>
<body>
    <h1>Controle de Acesso com Cookies</h1>

    <?php if ($usuarioConhecido): ?>
        <p>Bem-vindo(a) de volta, <strong><?= htmlspecialchars($_COOKIE[NOME_COOKIE]) ?></strong>!</p>
        <p>Este nome ficará salvo por <?= DIAS_EXPIRACAO ?> dias nos seus próximos acessos.</p>

        <a href="?esquecer=1">Não sou eu / Esquecer usuário</a>
    <?php else: ?>
        <p>Não te conhecemos ainda. Qual o seu nome?</p>

        <form method="POST" action="index.php">
            <label for="nome">Nome:</label><br>
            <input type="text" name="nome" id="nome" required><br><br>
            <button type="submit">Salvar</button>
        </form>
    <?php endif; ?>
</body>
</html>
