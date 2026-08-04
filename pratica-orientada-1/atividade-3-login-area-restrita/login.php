<?php
/**
 * Atividade 3 - Sistema de Login com Área Restrita
 * Autentica o usuário e inicia uma sessão.
 */
session_start();

// Credenciais fixas simulando uma base de usuários
const USUARIO_VALIDO = "admin";
const SENHA_VALIDA   = "1234";

$erro = null;

// Se já está logado, manda direto pra área restrita
if (isset($_SESSION['usuario_logado'])) {
    header("Location: restrita.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $senha   = trim($_POST['senha'] ?? '');

    if ($usuario === USUARIO_VALIDO && $senha === SENHA_VALIDA) {
        $_SESSION['usuario_logado'] = $usuario;
        header("Location: restrita.php");
        exit;
    } else {
        $erro = "Usuário ou senha inválidos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 3 - Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if ($erro): ?>
        <p style="color: red;"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label for="usuario">Usuário:</label><br>
        <input type="text" name="usuario" id="usuario"><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" name="senha" id="senha"><br><br>

        <button type="submit">Entrar</button>
    </form>

    <p><small>Dica de teste: usuário <strong>admin</strong>, senha <strong>1234</strong></small></p>
</body>
</html>
