<?php

declare(strict_types=1);

require_once 'Pessoa.php';
require_once 'ValidacaoIntervalo.php';
require_once 'Aluno.php';
require_once 'Professor.php';

/**
 * Atividade 4 - Demonstração de herança e trait
 * Aluno e Professor são tipos diferentes de Pessoa (herança), mas
 * compartilham a validação de intervalo através da trait (reutilização
 * de código sem herança múltipla).
 */

/** @var Pessoa[] $pessoas */
$pessoas = [
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
    <title>Atividade 4 - Classe Abstrata e Trait</title>
</head>
<body>
    <h1>Classe Abstrata e Trait</h1>
    <p>
        <code>Aluno</code> e <code>Professor</code> herdam de
        <code>Pessoa</code> (classe abstrata) e reutilizam a validação de
        intervalo através da trait <code>ValidacaoIntervalo</code>.
    </p>

    <ul>
        <?php foreach ($pessoas as $pessoa): ?>
            <li><?= htmlspecialchars($pessoa->apresentar()) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
