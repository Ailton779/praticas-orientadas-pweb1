<?php

declare(strict_types=1);

require_once 'Aluno.php';
require_once 'Turma.php';
require_once 'FormatoRelatorio.php';
require_once 'FormatoTextoSimples.php';
require_once 'FormatoHtmlTabela.php';
require_once 'RelatorioAcademico.php';

/**
 * Atividade 5 - Demonstração de Injeção de Dependência
 */

$turma = new Turma("Programação Web 1");
$turma->adicionarAluno(new Aluno("Ana", 8.5));
$turma->adicionarAluno(new Aluno("Bruno", 6.0));
$turma->adicionarAluno(new Aluno("Carla", 3.2));
$turma->adicionarAluno(new Aluno("Diego", 5.0));

// Escolhe o formato pela query string, só para demonstração (?formato=texto ou ?formato=html)
$formatoEscolhido = $_GET['formato'] ?? 'html';

// ---------- INJEÇÃO DE DEPENDÊNCIA ACONTECENDO AQUI ----------
// A escolha de QUAL implementação usar é feita FORA de RelatorioAcademico.
// A classe RelatorioAcademico continua exatamente igual, não importa qual
// das duas linhas abaixo seja usada.
$formato = $formatoEscolhido === 'texto'
    ? new FormatoTextoSimples()
    : new FormatoHtmlTabela();

$relatorio = new RelatorioAcademico($formato);
$conteudo = $relatorio->gerarRelatorio($turma);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 5 - Injeção de Dependência</title>
</head>
<body>
    <h1>Sistema de Relatórios com Injeção de Dependência</h1>

    <p>
        Formato atual: <strong><?= htmlspecialchars($formatoEscolhido) ?></strong> —
        <a href="?formato=html">ver em HTML</a> |
        <a href="?formato=texto">ver em texto simples</a>
    </p>

    <?php if ($formatoEscolhido === 'texto'): ?>
        <pre><?= htmlspecialchars($conteudo) ?></pre>
    <?php else: ?>
        <?= $conteudo ?>
    <?php endif; ?>
</body>
</html>
