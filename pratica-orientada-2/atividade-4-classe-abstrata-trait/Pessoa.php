<?php

declare(strict_types=1);

/**
 * Atividade 4 - Classe abstrata Pessoa
 * Define o que é comum a qualquer pessoa do sistema (Aluno, Professor, etc.)
 * Não pode ser instanciada diretamente — só serve como base para herança.
 */
abstract class Pessoa
{
    public function __construct(
        protected readonly string $nome
    ) {
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    // Método abstrato: cada subclasse é OBRIGADA a implementar do seu jeito
    abstract public function apresentar(): string;
}
