<?php

declare(strict_types=1);

require_once 'Pessoa.php';
require_once 'ValidacaoIntervalo.php';

/**
 * Atividade 4 - Professor herda de Pessoa e usa a trait ValidacaoIntervalo
 */
class Professor extends Pessoa
{
    use ValidacaoIntervalo;

    private float $avaliacaoDesempenho;

    public function __construct(
        string $nome,
        private readonly string $disciplina,
        float $avaliacaoDesempenho
    ) {
        parent::__construct($nome);
        $this->setAvaliacaoDesempenho($avaliacaoDesempenho);
    }

    public function getDisciplina(): string
    {
        return $this->disciplina;
    }

    public function setAvaliacaoDesempenho(float $avaliacao): void
    {
        $this->validarIntervalo($avaliacao, 0, 10, "avaliação de desempenho");
        $this->avaliacaoDesempenho = $avaliacao;
    }

    public function calcularDesempenho(): string
    {
        if ($this->avaliacaoDesempenho >= 8) {
            return "Excelente";
        } elseif ($this->avaliacaoDesempenho >= 6) {
            return "Satisfatório";
        } else {
            return "Insatisfatório";
        }
    }

    // ---------- IMPLEMENTAÇÃO DO MÉTODO ABSTRATO ----------
    public function apresentar(): string
    {
        return "Professor {$this->getNome()} ({$this->disciplina}), desempenho: {$this->calcularDesempenho()}";
    }
}
