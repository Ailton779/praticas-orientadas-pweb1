<?php

declare(strict_types=1);

/**
 * Atividade 1 - Refatoração para Classe
 * Representa um aluno e sua situação acadêmica.
 */
class Aluno
{
    private float $nota;

    public function __construct(
        private readonly string $nome,
        float $nota
    ) {
        $this->setNota($nota);
    }

    // ---------- ENCAPSULAMENTO ----------
    public function getNome(): string
    {
        return $this->nome;
    }

    public function getNota(): float
    {
        return $this->nota;
    }

    public function setNota(float $nota): void
    {
        if ($nota < 0 || $nota > 10) {
            throw new InvalidArgumentException("A nota deve estar entre 0 e 10.");
        }

        $this->nota = $nota;
    }

    // ---------- MÉTODO DE CÁLCULO DA SITUAÇÃO ----------
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
}
