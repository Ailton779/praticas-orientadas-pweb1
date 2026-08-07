<?php

namespace App\Policies;

use App\Models\Nota;
use App\Models\User;

class NotaPolicy
{
    /**
     * Determina se o usuário pode visualizar a nota.
     */
    public function view(User $user, Nota $nota): bool
    {
        return $user->id === $nota->user_id;
    }

    /**
     * Determina se o usuário pode editar a nota.
     */
    public function update(User $user, Nota $nota): bool
    {
        return $user->id === $nota->user_id;
    }

    /**
     * Determina se o usuário pode excluir a nota.
     */
    public function delete(User $user, Nota $nota): bool
    {
        return $user->id === $nota->user_id;
    }
}
