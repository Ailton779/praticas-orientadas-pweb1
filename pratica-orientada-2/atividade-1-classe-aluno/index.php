<?php

declare(strict_types=1);

require_once 'Aluno.php';

/**
 * Atividade 1 - Demonstração de uso da classe Aluno
 */

$resultado = null;
$erro = null;
$notaDigitada = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'], $_POST['nota'])) {
    $nomeDigitado = trim($_POST['nome']);
    $notaDigitada = $_POST['nota'];

    if (!is_numeric($notaDigitada)) {
        $erro = "Por favor, digite uma nota numérica válida.";
    } else {
        try {
            $aluno = new Aluno($nomeDigitado, (float) $notaDigitada);
            $resultado = [
                'nome' => $aluno->getNome(),
                'nota' => $aluno->getNota(),
                'situacao' => $aluno->calcularSituacao(),
            ];
        } catch (InvalidArgumentException $e) {
            $erro = $e->getMessage();
        }
    }
}

// ---------- DEMONSTRAÇÃO COM VÁRIOS OBJETOS ----------
$alunosExemplo = [
    new Aluno("Ana", 8.5),
    new Aluno("Bruno", 6.0),
    new Aluno("Carla", 3.2),
    new Aluno("Diego", 5.0),
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 1 - Classe Aluno</title>
</head>
<body>
    <h1>Classificação Acadêmica (POO)</h1>

    <?php if ($erro): ?>
        <p style="color: red;"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="nome">Nome do aluno:</label><br>
        <input type="text" name="nome" id="nome" required><br><br>

        <label for="nota">Nota (0 a 10):</label><br>
        <input type="number" step="0.1" min="0" max="10" name="nota" id="nota" required><br><br>

        <button type="submit">Verificar</button>
    </form>

    <?php if ($resultado): ?>
        <h2>Resultado</h2>
        <p>Aluno: <strong><?= htmlspecialchars($resultado['nome']) ?></strong></p>
        <p>Nota: <strong><?= htmlspecialchars((string) $resultado['nota']) ?></strong></p>
        <p>Situação: <strong><?= htmlspecialchars($resultado['situacao']) ?></strong></p>
    <?php endif; ?>

    <hr>

    <h2>Objetos de exemplo (instanciados diretamente no código)</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>Nome</th>
            <th>Nota</th>
            <th>Situação</th>
        </tr>
        <?php foreach ($alunosExemplo as $aluno): ?>
            <tr>
                <td><?= htmlspecialchars($aluno->getNome()) ?></td>
                <td><?= htmlspecialchars((string) $aluno->getNota()) ?></td>
                <td><?= htmlspecialchars($aluno->calcularSituacao()) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
