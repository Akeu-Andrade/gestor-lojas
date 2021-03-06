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
 * App\Business\Produto\Models\Produto
 *
 * @property int $id
 * @property string $nome
 * @property string|null $descricao
 * @property int|null $quantidade
 * @property float|null $valor_uni
 * @property string|null $imagem
 * @property float|null $quantidade_estoque
 * @property string|null $observacao
 * @property int $status_produto
 * @property float|null $desconto_porcento
 * @property float|null $valor_entrega
 * @property string|null $tamanho
 * @property int|null $categoria_id
 * @property int|null $user_id_cadastro
 * @property int|null $user_id_alteracao
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Categoria|null $categoria
 * @property-read User|null $userAlteracao
 * @property-read User|null $userCadastro
 * @property-read User $usuarioCadastro
 * @method static Builder|Produto newModelQuery()
 * @method static Builder|Produto newQuery()
 * @method static \Illuminate\Database\Query\Builder|Produto onlyTrashed()
 * @method static Builder|Produto query()
 * @method static Builder|Produto whereCategoriaId($value)
 * @method static Builder|Produto whereCreatedAt($value)
 * @method static Builder|Produto whereCreatedAtAte(string $data)
 * @method static Builder|Produto whereCreatedAtDe(string $data)
 * @method static Builder|Produto whereDeletedAt($value)
 * @method static Builder|Produto whereDescontoPorcento($value)
 * @method static Builder|Produto whereDescricao($value)
 * @method static Builder|Produto whereId($value)
 * @method static Builder|Produto whereImagem($value)
 * @method static Builder|Produto whereNome($value)
 * @method static Builder|Produto whereObservacao($value)
 * @method static Builder|Produto whereQuantidade($value)
 * @method static Builder|Produto whereQuantidadeEstoque($value)
 * @method static Builder|Produto whereStatusProduto($value)
 * @method static Builder|Produto whereTamanho($value)
 * @method static Builder|Produto whereUpdatedAt($value)
 * @method static Builder|Produto whereUserIdAlteracao($value)
 * @method static Builder|Produto whereUserIdCadastro($value)
 * @method static Builder|Produto whereValorEntrega($value)
 * @method static Builder|Produto whereValorUni($value)
 * @method static \Illuminate\Database\Query\Builder|Produto withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Produto withoutTrashed()
 * @mixin Eloquent
 */
class Produto extends Model
{
    use SoftDeletes;
    use UserLog;

    CONST DIR_FOTO = "produto/imagem/";
    protected $fillable = [
        'nome',
        'descricao',
        'user_cadastro_id',
        'quantidade',
        'valor_uni',
        'imagem',
        'quantidade_estoque',
        'observacao',
        'tamanho',
        'categoria_id',
        'status_produto',
        'desconto_porcento',
        'is_retirar',
        'valor_entrega',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function getCaminhoImagem()
    {
        if (empty($this->imagem)) {
            return "";
        }
        return asset("storage/".self::DIR_FOTO.$this->imagem);
    }

    /**
     * @return mixed
     */
    public function usuarioCadastro()
    {
        return $this->belongsTo(User::class, 'user_cadastro_id')->withTrashed();
    }

    /**
     * @return BelongsTo
     */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
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
