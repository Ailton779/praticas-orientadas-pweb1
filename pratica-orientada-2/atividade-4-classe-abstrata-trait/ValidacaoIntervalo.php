<?php

declare(strict_types=1);

/**
 * Atividade 4 - Trait para reutilização de código
 * Valida se um valor numérico está dentro de um intervalo permitido.
 * Usada por Aluno (nota) e Professor (avaliação de desempenho), que não
 * têm relação de herança entre si além da Pessoa em comum.
 */
trait ValidacaoIntervalo
{
    private function validarIntervalo(float $valor, float $min, float $max, string $campo): void
    {
        if ($valor < $min || $valor > $max) {
            throw new InvalidArgumentException(
                "O campo {$campo} deve estar entre {$min} e {$max}."
            );
        }
    }
}
