<?php

namespace App\Business\Produto\Models;

use App\Models\User;
use App\Models\UserLog;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;


/**
 * App\Business\Produto\Models\PedidoProduto
 *
 * @property int $id
 * @property int|null $pedido_id
 * @property int|null $produto_id
 * @property int $status
 * @property string $valor
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Produto|null $produto
 * @property-read User $userAlteracao
 * @property-read User $userCadastro
 * @method static Builder|PedidoProduto newModelQuery()
 * @method static Builder|PedidoProduto newQuery()
 * @method static \Illuminate\Database\Query\Builder|PedidoProduto onlyTrashed()
 * @method static Builder|PedidoProduto query()
 * @method static Builder|PedidoProduto whereCreatedAt($value)
 * @method static Builder|PedidoProduto whereCreatedAtAte(string $data)
 * @method static Builder|PedidoProduto whereCreatedAtDe(string $data)
 * @method static Builder|PedidoProduto whereDeletedAt($value)
 * @method static Builder|PedidoProduto whereId($value)
 * @method static Builder|PedidoProduto wherePedidoId($value)
 * @method static Builder|PedidoProduto whereProdutoId($value)
 * @method static Builder|PedidoProduto whereStatus($value)
 * @method static Builder|PedidoProduto whereUpdatedAt($value)
 * @method static Builder|PedidoProduto whereValor($value)
 * @method static \Illuminate\Database\Query\Builder|PedidoProduto withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PedidoProduto withoutTrashed()
 * @mixin Eloquent
 */
class PedidoProduto extends Model
{
    use SoftDeletes;
    use UserLog;

    protected $fillable = [
        'status',
        'valor',
        'pedido_id',
        'produto_id',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * @return mixed
     */
    public function produto()
    {
        return$this->belongsTo(Produto::class)->withTrashed();
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
