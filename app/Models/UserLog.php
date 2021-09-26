<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait UserLog
{
    public function userAlteracao(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id_alteracao', 'id')->withTrashed();
    }

    public function userCadastro(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id_cadastro', 'id')->withTrashed();
    }
}
