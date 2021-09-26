<?php

namespace App\Business\Produto\Models;

use App\Models\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Business\Produto\Models\CompraUsuario
 *
 * @property int $id
 * @property int $status_compra_usuario
 * @property int $forma_pagamento
 * @property float|null $quantidade
 * @property int|null $produto_id
 * @property int|null $user_comprador_id
 * @property int|null $user_id_cadastro
 * @property int|null $user_id_alteracao
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \App\Business\Produto\Models\Produto|null $produto
 * @property-read User|null $usuarioComprador
 * @method static Builder|CompraUsuario newModelQuery()
 * @method static Builder|CompraUsuario newQuery()
 * @method static \Illuminate\Database\Query\Builder|CompraUsuario onlyTrashed()
 * @method static Builder|CompraUsuario query()
 * @method static Builder|CompraUsuario whereCreatedAt($value)
 * @method static Builder|CompraUsuario whereCreatedAtAte(string $data)
 * @method static Builder|CompraUsuario whereCreatedAtDe(string $data)
 * @method static Builder|CompraUsuario whereDeletedAt($value)
 * @method static Builder|CompraUsuario whereFormaPagamento($value)
 * @method static Builder|CompraUsuario whereId($value)
 * @method static Builder|CompraUsuario whereProdutoId($value)
 * @method static Builder|CompraUsuario whereQuantidade($value)
 * @method static Builder|CompraUsuario whereStatusCompraUsuario($value)
 * @method static Builder|CompraUsuario whereUpdatedAt($value)
 * @method static Builder|CompraUsuario whereUserCompradorId($value)
 * @method static Builder|CompraUsuario whereUserIdAlteracao($value)
 * @method static Builder|CompraUsuario whereUserIdCadastro($value)
 * @method static \Illuminate\Database\Query\Builder|CompraUsuario withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CompraUsuario withoutTrashed()
 * @mixin Eloquent
 */
class CompraUsuario extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'produto_id',
        'user_comprador_id',
        'quantidade',
        'status_compra_usuario',
        'forma_pagamento',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * @return mixed
     */
    public function usuarioComprador()
    {
        return $this->belongsTo(User::class, 'user_comprador_id')->withTrashed();
    }

    /**
     * @return BelongsTo
     */
    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }

    public function scopeWhereCreatedAtAte(Builder $query, string $data)
    {
        return $query->whereDate('created_at', '<=', $data);
    }

    public function scopeWhereCreatedAtDe(Builder $query, string $data)
    {
        return $query->whereDate('created_at', '>=', $data);
    }

}
