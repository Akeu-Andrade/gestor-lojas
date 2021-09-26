<?php

namespace App\Business\Produto\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Business\Produto\Models\VariacaoProduto
 *
 * @property int $id
 * @property string $nome
 * @property string|null $descricao
 * @property float|null $qtd_opcao
 * @property string|null $imagem
 * @property int|null $produto_id
 * @property int|null $user_id_cadastro
 * @property int|null $user_id_alteracao
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Business\Produto\Models\ItemVariacaoProduto[] $itemVariacaoProduto
 * @property-read int|null $item_variacao_produto_count
 * @property-read \App\Business\Produto\Models\Produto|null $produto
 * @method static Builder|VariacaoProduto newModelQuery()
 * @method static Builder|VariacaoProduto newQuery()
 * @method static \Illuminate\Database\Query\Builder|VariacaoProduto onlyTrashed()
 * @method static Builder|VariacaoProduto query()
 * @method static Builder|VariacaoProduto whereCreatedAt($value)
 * @method static Builder|VariacaoProduto whereCreatedAtAte(string $data)
 * @method static Builder|VariacaoProduto whereCreatedAtDe(string $data)
 * @method static Builder|VariacaoProduto whereDeletedAt($value)
 * @method static Builder|VariacaoProduto whereDescricao($value)
 * @method static Builder|VariacaoProduto whereId($value)
 * @method static Builder|VariacaoProduto whereImagem($value)
 * @method static Builder|VariacaoProduto whereNome($value)
 * @method static Builder|VariacaoProduto whereProdutoId($value)
 * @method static Builder|VariacaoProduto whereQtdOpcao($value)
 * @method static Builder|VariacaoProduto whereUpdatedAt($value)
 * @method static Builder|VariacaoProduto whereUserIdAlteracao($value)
 * @method static Builder|VariacaoProduto whereUserIdCadastro($value)
 * @method static \Illuminate\Database\Query\Builder|VariacaoProduto withTrashed()
 * @method static \Illuminate\Database\Query\Builder|VariacaoProduto withoutTrashed()
 * @mixin Eloquent
 */
class VariacaoProduto extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'descricao',
        'qtd_opcao',
        'imagem',
        'produto_id',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * @return BelongsTo
     */
    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }

    /**
     * @return HasMany
     */
    public function itemVariacaoProduto(): HasMany
    {
        return $this->hasMany(ItemVariacaoProduto::class);
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
