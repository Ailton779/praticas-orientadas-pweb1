<?php

declare(strict_types=1);

require_once 'Pessoa.php';
require_once 'ValidacaoIntervalo.php';

/**
 * Atividade 4 - Aluno herda de Pessoa e usa a trait ValidacaoIntervalo
 */
class Aluno extends Pessoa
{
    use ValidacaoIntervalo;

    private float $nota;

    public function __construct(string $nome, float $nota)
    {
        parent::__construct($nome);
        $this->setNota($nota);
    }

    public function getNota(): float
    {
        return $this->nota;
    }

    public function setNota(float $nota): void
    {
        $this->validarIntervalo($nota, 0, 10, "nota");
        $this->nota = $nota;
    }

    public function calcularSituacao(): string
    {
        if ($this->nota >= 7) {
            return "Aprovado";
        } elseif ($this->nota >= 5) {
            return "Recuperação";
        } else {
            return "Reprovado";
        }
    }

    // ---------- IMPLEMENTAÇÃO DO MÉTODO ABSTRATO ----------
    public function apresentar(): string
    {
        return "Aluno {$this->getNome()}, situação: {$this->calcularSituacao()}";
    }
}
