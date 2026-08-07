<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Crypt;

class Nota extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'titulo',
        'conteudo',
    ];

    /**
     * Relacionamento: uma nota pertence a um usuário.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Criptografa o conteúdo automaticamente sempre que for definido
     * (ex: $nota->conteudo = "texto"), usando Crypt::encryptString(),
     * conforme exigido na atividade.
     */
    public function setConteudoAttribute(string $value): void
    {
        $this->attributes['conteudo'] = Crypt::encryptString($value);
    }

    /**
     * Descriptografa o conteúdo automaticamente sempre que for lido
     * (ex: $nota->conteudo), usando Crypt::decryptString().
     */
    public function getConteudoAttribute(string $value): string
    {
        return Crypt::decryptString($value);
    }
}
