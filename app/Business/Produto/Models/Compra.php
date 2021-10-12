<?php

namespace App\Business\Produto\Models;

use App\Models\User;
use App\Models\UserLog;
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
 * @property int $status_compra
 * @property int $forma_pagamento
 * @property float|null $quantidade
 * @property int|null $produto_id
 * @property int|null $user_comprador_id
 * @property int|null $user_id_cadastro
 * @property int|null $user_id_alteracao
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Produto|null $produto
 * @property-read User|null $usuarioComprador
 * @method static Builder|Compra newModelQuery()
 * @method static Builder|Compra newQuery()
 * @method static \Illuminate\Database\Query\Builder|Compra onlyTrashed()
 * @method static Builder|Compra query()
 * @method static Builder|Compra whereCreatedAt($value)
 * @method static Builder|Compra whereCreatedAtAte(string $data)
 * @method static Builder|Compra whereCreatedAtDe(string $data)
 * @method static Builder|Compra whereDeletedAt($value)
 * @method static Builder|Compra whereFormaPagamento($value)
 * @method static Builder|Compra whereId($value)
 * @method static Builder|Compra whereProdutoId($value)
 * @method static Builder|Compra whereQuantidade($value)
 * @method static Builder|Compra whereStatusCompra($value)
 * @method static Builder|Compra whereUpdatedAt($value)
 * @method static Builder|Compra whereUserCompradorId($value)
 * @method static Builder|Compra whereUserIdAlteracao($value)
 * @method static Builder|Compra whereUserIdCadastro($value)
 * @method static \Illuminate\Database\Query\Builder|Compra withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Compra withoutTrashed()
 * @mixin Eloquent
 */
class Compra extends Model
{
    use SoftDeletes;
    use UserLog;

    protected $fillable = [
        'produto_id',
        'user_comprador_id',
        'quantidade',
        'observacao',
        'status_compra',
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
