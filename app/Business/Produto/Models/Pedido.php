<?php

namespace App\Business\Produto\Models;

use App\Models\User;
use App\Models\UserLog;
use DB;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;


/**
 * App\Business\Produto\Models\Pedido
 *
 * @property int $id
 * @property int $status
 * @property int $forma_pagamento
 * @property int|null $user_comprador_id
 * @property int|null $user_id_cadastro
 * @property int|null $user_id_alteracao
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|PedidoProduto[] $pedidoProduto
 * @property-read int|null $pedido_produto_count
 * @property-read Collection|PedidoProduto[] $pedidoProdutoItens
 * @property-read int|null $pedido_produto_itens_count
 * @property-read User|null $userAlteracao
 * @property-read User|null $userCadastro
 * @property-read User|null $usuarioComprador
 * @method static Builder|Pedido newModelQuery()
 * @method static Builder|Pedido newQuery()
 * @method static \Illuminate\Database\Query\Builder|Pedido onlyTrashed()
 * @method static Builder|Pedido query()
 * @method static Builder|Pedido whereCreatedAt($value)
 * @method static Builder|Pedido whereCreatedAtAte(string $data)
 * @method static Builder|Pedido whereCreatedAtDe(string $data)
 * @method static Builder|Pedido whereDeletedAt($value)
 * @method static Builder|Pedido whereFormaPagamento($value)
 * @method static Builder|Pedido whereId($value)
 * @method static Builder|Pedido whereStatus($value)
 * @method static Builder|Pedido whereUpdatedAt($value)
 * @method static Builder|Pedido whereUserCompradorId($value)
 * @method static Builder|Pedido whereUserIdAlteracao($value)
 * @method static Builder|Pedido whereUserIdCadastro($value)
 * @method static \Illuminate\Database\Query\Builder|Pedido withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Pedido withoutTrashed()
 * @mixin Eloquent
 */
class Pedido extends Model
{
    use SoftDeletes;
    use UserLog;

    protected $fillable = [
        'user_comprador_id',
        'status',
        'forma_pagamento',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function pedidoProduto()
    {
        return $this->hasMany(PedidoProduto::class)
            ->select( DB::raw('produto_id, sum(valor) as valores, count(1) as qtd') )
            ->groupBy('produto_id')
            ->orderBy('produto_id', 'desc');
    }

    public static function consultaId($where)
    {
        $pedido = self::where($where)->first(['id']);
        return !empty($pedido->id) ? $pedido->id : null;
    }

    /**
     * @return mixed
     */
    public function pedidoProdutoItens()
    {
        return$this->hasMany(PedidoProduto::class)->withTrashed();
    }

    /**
     * @return mixed
     */
    public function usuarioComprador()
    {
        return $this->belongsTo(User::class, 'user_comprador_id')->withTrashed();
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
