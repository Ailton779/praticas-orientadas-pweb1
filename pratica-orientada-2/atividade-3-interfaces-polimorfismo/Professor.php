<?php

declare(strict_types=1);

require_once 'Avaliavel.php';

/**
 * Atividade 3 - Classe Professor implementando Avaliavel
 * O critério de avaliação é diferente do Aluno: baseado na avaliação
 * de desempenho recebida (ex: nota dada pelos alunos, de 0 a 10).
 */
class Professor implements Avaliavel
{
    private float $avaliacaoDesempenho;

    public function __construct(
        private readonly string $nome,
        private readonly string $disciplina,
        float $avaliacaoDesempenho
    ) {
        $this->setAvaliacaoDesempenho($avaliacaoDesempenho);
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getDisciplina(): string
    {
        return $this->disciplina;
    }

    public function setAvaliacaoDesempenho(float $avaliacao): void
    {
        if ($avaliacao < 0 || $avaliacao > 10) {
            throw new InvalidArgumentException("A avaliação deve estar entre 0 e 10.");
        }

        $this->avaliacaoDesempenho = $avaliacao;
    }

    // ---------- IMPLEMENTAÇÃO DA INTERFACE ----------
    // Critério diferente do Aluno: aqui não existe "Recuperação"
    public function avaliar(): string
    {
        if ($this->avaliacaoDesempenho >= 8) {
            return "Desempenho excelente";
        } elseif ($this->avaliacaoDesempenho >= 6) {
            return "Desempenho satisfatório";
        } else {
            return "Desempenho insatisfatório";
        }
    }
}
