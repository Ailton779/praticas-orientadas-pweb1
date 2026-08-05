<?php

declare(strict_types=1);

require_once 'FormatoRelatorio.php';

/**
 * Atividade 5 - Formato de relatório em tabela HTML.
 */
class FormatoHtmlTabela implements FormatoRelatorio
{
    public function gerar(Turma $turma): string
    {
        $html = "<h2>Relatório da turma: " . htmlspecialchars($turma->getNome()) . "</h2>";
        $html .= "<table border='1' cellpadding='8'>";
        $html .= "<tr><th>Nome</th><th>Nota</th><th>Situação</th></tr>";

        foreach ($turma->listarAlunos() as $aluno) {
            $html .= "<tr>";
            $html .= "<td>" . htmlspecialchars($aluno->getNome()) . "</td>";
            $html .= "<td>" . htmlspecialchars((string) $aluno->getNota()) . "</td>";
            $html .= "<td>" . htmlspecialchars($aluno->calcularSituacao()) . "</td>";
            $html .= "</tr>";
        }

        $html .= "</table>";
        $html .= "<p><strong>Média da turma:</strong> " . number_format($turma->calcularMediaTurma(), 2) . "</p>";

        return $html;
    }
}
