<?php

declare(strict_types=1);

require_once 'Aluno.php';
require_once 'Turma.php';

/**
 * Atividade 2 - Demonstração de uso da classe Turma
 */

$erro = null;
$turma = new Turma("Programação Web 1");

// Alunos de exemplo já cadastrados na turma
try {
    $turma->adicionarAluno(new Aluno("Ana", 8.5));
    $turma->adicionarAluno(new Aluno("Bruno", 6.0));
    $turma->adicionarAluno(new Aluno("Carla", 3.2));
    $turma->adicionarAluno(new Aluno("Diego", 5.0));
} catch (InvalidArgumentException $e) {
    $erro = $e->getMessage();
}

// Adiciona um novo aluno via formulário, se enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'], $_POST['nota'])) {
    $nome = trim($_POST['nome']);
    $nota = $_POST['nota'];

    if (!is_numeric($nota)) {
        $erro = "Por favor, digite uma nota numérica válida.";
    } else {
        try {
            $turma->adicionarAluno(new Aluno($nome, (float) $nota));
        } catch (InvalidArgumentException $e) {
            $erro = $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 2 - Gerenciador de Turma</title>
</head>
<body>
    <h1>Turma: <?= htmlspecialchars($turma->getNome()) ?></h1>

    <?php if ($erro): ?>
        <p style="color: red;"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="nome">Nome do novo aluno:</label><br>
        <input type="text" name="nome" id="nome" required><br><br>

        <label for="nota">Nota (0 a 10):</label><br>
        <input type="number" step="0.1" min="0" max="10" name="nota" id="nota" required><br><br>

        <button type="submit">Adicionar à turma</button>
    </form>

    <h2>Alunos da turma (<?= $turma->totalAlunos() ?>)</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>Nome</th>
            <th>Nota</th>
            <th>Situação</th>
        </tr>
        <?php foreach ($turma->listarAlunos() as $aluno): ?>
            <tr>
                <td><?= htmlspecialchars($aluno->getNome()) ?></td>
                <td><?= htmlspecialchars((string) $aluno->getNota()) ?></td>
                <td><?= htmlspecialchars($aluno->calcularSituacao()) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Média da turma: <?= number_format($turma->calcularMediaTurma(), 2) ?></h2>
</body>
</html>
