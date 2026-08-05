<?php

declare(strict_types=1);

require_once 'FormatoRelatorio.php';
require_once 'Turma.php';

/**
 * Atividade 5 - Classe responsável por orquestrar a geração do relatório.
 *
 * INJEÇÃO DE DEPENDÊNCIA: esta classe NÃO cria o formato do relatório
 * internamente (ex: "new FormatoHtmlTabela()" aqui dentro). Em vez disso,
 * ela RECEBE pronto um objeto que implemente FormatoRelatorio através do
 * construtor. Isso separa a responsabilidade de "gerar o relatório" da
 * responsabilidade de "decidir o formato do relatório".
 */
class RelatorioAcademico
{
    public function __construct(
        private readonly FormatoRelatorio $formato
    ) {
    }

    public function gerarRelatorio(Turma $turma): string
    {
        // Não sabe (e não precisa saber) qual formato concreto está sendo usado
        return $this->formato->gerar($turma);
    }
}
