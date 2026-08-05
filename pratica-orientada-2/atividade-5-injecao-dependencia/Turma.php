<?php

declare(strict_types=1);

require_once 'Aluno.php';

/**
 * Atividade 5 - Classe Turma (reaproveitada da atividade 2)
 */
class Turma
{
    /** @var Aluno[] */
    private array $alunos = [];

    public function __construct(
        private readonly string $nome
    ) {
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function adicionarAluno(Aluno $aluno): void
    {
        $this->alunos[] = $aluno;
    }

    /** @return Aluno[] */
    public function listarAlunos(): array
    {
        return $this->alunos;
    }

    public function calcularMediaTurma(): float
    {
        if (count($this->alunos) === 0) {
            return 0.0;
        }

        $soma = 0.0;
        foreach ($this->alunos as $aluno) {
            $soma += $aluno->getNota();
        }

        return round($soma / count($this->alunos), 2);
    }
}
