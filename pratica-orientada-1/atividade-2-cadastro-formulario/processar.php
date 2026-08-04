<?php
/**
 * Atividade 2 - Simulador de Cadastro via Formulário
 * Recebe dados via POST, valida e exibe organizadamente.
 */

$erros = [];
$dados = [
    'nome'   => trim($_POST['nome'] ?? ''),
    'email'  => trim($_POST['email'] ?? ''),
    'idade'  => trim($_POST['idade'] ?? ''),
    'cidade' => trim($_POST['cidade'] ?? ''),
];

// ---------- VALIDAÇÕES ----------
if (empty($dados['nome'])) {
    $erros[] = "O campo Nome é obrigatório.";
} elseif (strlen($dados['nome']) < 3) {
    $erros[] = "O Nome deve ter pelo menos 3 caracteres.";
}

if (empty($dados['email'])) {
    $erros[] = "O campo E-mail é obrigatório.";
} elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
    $erros[] = "O E-mail informado não é válido.";
}

if (empty($dados['idade'])) {
    $erros[] = "O campo Idade é obrigatório.";
} elseif (!ctype_digit($dados['idade'])) {
    $erros[] = "A Idade deve ser um número inteiro.";
} elseif ((int) $dados['idade'] < 1 || (int) $dados['idade'] > 120) {
    $erros[] = "A Idade informada é inválida.";
}

if (empty($dados['cidade'])) {
    $erros[] = "O campo Cidade é obrigatório.";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado do Cadastro</title>
</head>
<body>
    <h1>Resultado do Cadastro</h1>

    <?php if (!empty($erros)): ?>
        <h2 style="color: red;">Erros encontrados:</h2>
        <ul>
            <?php foreach ($erros as $erro): ?>
                <li><?= htmlspecialchars($erro) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <h2 style="color: green;">Cadastro realizado com sucesso!</h2>
        <table border="1" cellpadding="8">
            <tr>
                <th>Campo</th>
                <th>Valor</th>
            </tr>
            <tr>
                <td>Nome</td>
                <td><?= htmlspecialchars($dados['nome']) ?></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td><?= htmlspecialchars($dados['email']) ?></td>
            </tr>
            <tr>
                <td>Idade</td>
                <td><?= htmlspecialchars($dados['idade']) ?></td>
            </tr>
            <tr>
                <td>Cidade</td>
                <td><?= htmlspecialchars($dados['cidade']) ?></td>
            </tr>
        </table>
    <?php endif; ?>

    <br>
    <a href="formulario.php">Voltar ao formulário</a>
</body>
</html>
