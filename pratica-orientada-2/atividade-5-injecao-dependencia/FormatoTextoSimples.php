<?php

declare(strict_types=1);

require_once 'FormatoRelatorio.php';

/**
 * Atividade 5 - Formato de relatório em texto simples (sem HTML).
 */
class FormatoTextoSimples implements FormatoRelatorio
{
    public function gerar(Turma $turma): string
    {
        $linhas = [];
        $linhas[] = "Relatório da turma: {$turma->getNome()}";
        $linhas[] = str_repeat("-", 40);

        foreach ($turma->listarAlunos() as $aluno) {
            $linhas[] = sprintf(
                "%s | Nota: %.1f | %s",
                $aluno->getNome(),
                $aluno->getNota(),
                $aluno->calcularSituacao()
            );
        }

        $linhas[] = str_repeat("-", 40);
        $linhas[] = "Média da turma: " . number_format($turma->calcularMediaTurma(), 2);

        return implode("\n", $linhas);
    }
}
