<?php

namespace App\Business\Produto\Models;

use App\Models\UserLog;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Business\Produto\Models\Categoria
 *
 * @property int $id
 * @property string $name
 * @property string|null $descricao
 * @property int|null $user_id_cadastro
 * @property int|null $user_id_alteracao
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Produto[] $produto
 * @property-read int|null $produto_count
 * @method static Builder|Categoria newModelQuery()
 * @method static Builder|Categoria newQuery()
 * @method static \Illuminate\Database\Query\Builder|Categoria onlyTrashed()
 * @method static Builder|Categoria query()
 * @method static Builder|Categoria whereCreatedAt($value)
 * @method static Builder|Categoria whereCreatedAtAte(string $data)
 * @method static Builder|Categoria whereCreatedAtDe(string $data)
 * @method static Builder|Categoria whereDeletedAt($value)
 * @method static Builder|Categoria whereDescricao($value)
 * @method static Builder|Categoria whereId($value)
 * @method static Builder|Categoria whereName($value)
 * @method static Builder|Categoria whereUpdatedAt($value)
 * @method static Builder|Categoria whereUserIdAlteracao($value)
 * @method static Builder|Categoria whereUserIdCadastro($value)
 * @method static \Illuminate\Database\Query\Builder|Categoria withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Categoria withoutTrashed()
 * @mixin Eloquent
 */
class Categoria extends Model
{
    use SoftDeletes;
    use UserLog;


    protected $fillable = [
        'id',
        'name',
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
