<?php

declare(strict_types=1);

require_once 'Turma.php';

/**
 * Atividade 5 - Contrato para qualquer formato de saída de relatório.
 * RelatorioAcademico depende desta interface, não de uma implementação
 * concreta específica — isso é o que torna a injeção de dependência possível.
 */
interface FormatoRelatorio
{
    public function gerar(Turma $turma): string;
}
