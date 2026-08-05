<?php

declare(strict_types=1);

require_once 'Avaliavel.php';
require_once 'Aluno.php';
require_once 'Professor.php';

/**
 * Atividade 3 - Demonstração de Polimorfismo
 * Um mesmo array contém objetos de tipos diferentes (Aluno e Professor),
 * todos tratados como Avaliavel. O método avaliar() é chamado igual para
 * todos, mas cada objeto executa sua própria lógica.
 */

/** @var Avaliavel[] $avaliaveis */
$avaliaveis = [
    new Aluno("Ana", 8.5),
    new Professor("Carlos", "Programação Web 1", 9.2),
    new Aluno("Bruno", 4.0),
    new Professor("Marina", "Banco de Dados", 5.5),
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 3 - Interfaces e Polimorfismo</title>
</head>
<body>
    <h1>Interfaces e Polimorfismo</h1>
    <p>
        Todos os objetos abaixo implementam a interface <code>Avaliavel</code>.
        O mesmo método <code>avaliar()</code> é chamado para todos, mas cada
        classe (<code>Aluno</code> ou <code>Professor</code>) executa sua
        própria lógica de avaliação.
    </p>

    <table border="1" cellpadding="8">
        <tr>
            <th>Tipo</th>
            <th>Nome</th>
            <th>Resultado de avaliar()</th>
        </tr>
        <?php foreach ($avaliaveis as $item): ?>
            <tr>
                <td>
                    <?php if ($item instanceof Aluno): ?>
                        Aluno
                    <?php elseif ($item instanceof Professor): ?>
                        Professor
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($item->getNome()) ?></td>
                <td><?= htmlspecialchars($item->avaliar()) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
