<?php
/**
 * Atividade 1 - Sistema de Classificação Acadêmica
 * Recebe uma nota e informa a situação do aluno.
 */

// ---------- FUNÇÃO ----------
function classificarAluno(float $nota): string
{
    if ($nota < 0 || $nota > 10) {
        return "Nota inválida";
    }

    if ($nota >= 7) {
        return "Aprovado";
    } elseif ($nota >= 5) {
        return "Recuperação";
    } else {
        return "Reprovado";
    }
}

// ---------- PROCESSAMENTO DO FORMULÁRIO ----------
$resultado = null;
$notaDigitada = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nota'])) {
    $notaDigitada = $_POST['nota'];

    if (is_numeric($notaDigitada)) {
        $resultado = classificarAluno((float) $notaDigitada);
    } else {
        $resultado = "Por favor, digite um número válido.";
    }
}

// ---------- DEMONSTRAÇÃO DE REPETIÇÃO ----------
// Testa a função com uma lista de notas de exemplo
$notasExemplo = [2.5, 5.0, 6.5, 7.0, 9.8, 10, -1, 11];
$testes = [];

foreach ($notasExemplo as $nota) {
    $testes[] = [
        'nota' => $nota,
        'situacao' => classificarAluno($nota)
    ];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 1 - Classificação Acadêmica</title>
</head>
<body>
    <h1>Sistema de Classificação Acadêmica</h1>

    <form method="POST" action="">
        <label for="nota">Digite a nota do aluno (0 a 10):</label><br>
        <input type="number" step="0.1" min="0" max="10" name="nota" id="nota" required>
        <button type="submit">Verificar</button>
    </form>

    <?php if ($resultado !== null): ?>
        <h2>Resultado</h2>
        <p>Nota informada: <strong><?= htmlspecialchars($notaDigitada) ?></strong></p>
        <p>Situação: <strong><?= htmlspecialchars($resultado) ?></strong></p>
    <?php endif; ?>

    <hr>

    <h2>Testes automáticos (demonstração de repetição)</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>Nota</th>
            <th>Situação</th>
        </tr>
        <?php foreach ($testes as $teste): ?>
            <tr>
                <td><?= htmlspecialchars($teste['nota']) ?></td>
                <td><?= htmlspecialchars($teste['situacao']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
