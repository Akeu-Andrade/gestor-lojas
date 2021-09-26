<?php

namespace App\Business\Produto\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Business\Produto\Models\ItemVariacaoProduto
 *
 * @property int $id
 * @property string $nome
 * @property int|null $variacao_produto_id
 * @property int|null $user_id_cadastro
 * @property int|null $user_id_alteracao
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read VariacaoProduto|null $variacaoProduto
 * @method static Builder|ItemVariacaoProduto newModelQuery()
 * @method static Builder|ItemVariacaoProduto newQuery()
 * @method static \Illuminate\Database\Query\Builder|ItemVariacaoProduto onlyTrashed()
 * @method static Builder|ItemVariacaoProduto query()
 * @method static Builder|ItemVariacaoProduto whereCreatedAt($value)
 * @method static Builder|ItemVariacaoProduto whereCreatedAtAte(string $data)
 * @method static Builder|ItemVariacaoProduto whereCreatedAtDe(string $data)
 * @method static Builder|ItemVariacaoProduto whereDeletedAt($value)
 * @method static Builder|ItemVariacaoProduto whereId($value)
 * @method static Builder|ItemVariacaoProduto whereNome($value)
 * @method static Builder|ItemVariacaoProduto whereUpdatedAt($value)
 * @method static Builder|ItemVariacaoProduto whereUserIdAlteracao($value)
 * @method static Builder|ItemVariacaoProduto whereUserIdCadastro($value)
 * @method static Builder|ItemVariacaoProduto whereVariacaoProdutoId($value)
 * @method static \Illuminate\Database\Query\Builder|ItemVariacaoProduto withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ItemVariacaoProduto withoutTrashed()
 * @mixin Eloquent
 */
class ItemVariacaoProduto extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'variacao_produto_id',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * @return BelongsTo
     */
    public function variacaoProduto(): BelongsTo
    {
        return $this->belongsTo(VariacaoProduto::class);
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
