<?php

declare(strict_types=1);

require_once 'Aluno.php';

/**
 * Atividade 2 - Gerenciador de Turma
 * Armazena vários objetos Aluno (composição) e calcula estatísticas da turma.
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

    public function totalAlunos(): int
    {
        return count($this->alunos);
    }

    public function calcularMediaTurma(): float
    {
        if ($this->totalAlunos() === 0) {
            return 0.0;
        }

        $somaNotas = 0.0;
        foreach ($this->alunos as $aluno) {
            $somaNotas += $aluno->getNota();
        }

        return round($somaNotas / $this->totalAlunos(), 2);
    }
}
