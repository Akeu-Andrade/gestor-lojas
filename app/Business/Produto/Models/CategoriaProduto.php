<?php

namespace App\Business\Produto\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Business\Produto\Models\CategoriaProduto
 *
 * @property int $id
 * @property string $name
 * @property string|null $descricao
 * @property int|null $user_id_cadastro
 * @property int|null $user_id_alteracao
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|\App\Business\Produto\Models\Produto[] $produto
 * @property-read int|null $produto_count
 * @method static Builder|CategoriaProduto newModelQuery()
 * @method static Builder|CategoriaProduto newQuery()
 * @method static \Illuminate\Database\Query\Builder|CategoriaProduto onlyTrashed()
 * @method static Builder|CategoriaProduto query()
 * @method static Builder|CategoriaProduto whereCreatedAt($value)
 * @method static Builder|CategoriaProduto whereCreatedAtAte(string $data)
 * @method static Builder|CategoriaProduto whereCreatedAtDe(string $data)
 * @method static Builder|CategoriaProduto whereDeletedAt($value)
 * @method static Builder|CategoriaProduto whereDescricao($value)
 * @method static Builder|CategoriaProduto whereId($value)
 * @method static Builder|CategoriaProduto whereName($value)
 * @method static Builder|CategoriaProduto whereUpdatedAt($value)
 * @method static Builder|CategoriaProduto whereUserIdAlteracao($value)
 * @method static Builder|CategoriaProduto whereUserIdCadastro($value)
 * @method static \Illuminate\Database\Query\Builder|CategoriaProduto withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CategoriaProduto withoutTrashed()
 * @mixin Eloquent
 */
class CategoriaProduto extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'descricao',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * @return HasMany
     */
    public function produto(): HasMany
    {
        return $this->hasMany(Produto::class);
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
