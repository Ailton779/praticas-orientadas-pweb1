<?php

declare(strict_types=1);

/**
 * Atividade 3 - Interface Avaliavel
 * Contrato para qualquer entidade que possa ser avaliada no sistema.
 */
interface Avaliavel
{
    public function avaliar(): string;
}
