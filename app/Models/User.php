<?php

namespace App\Models;

use App\Business\Produto\Models\CompraUsuario;
use App\Business\Produto\Models\Produto;
use App\Business\Seguranca\Models\Perfil;
use Database\Factories\UserFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $observacao
 * @property string|null $imagem
 * @property string|null $rua
 * @property string|null $complemento
 * @property string|null $bairro
 * @property int|null $numero
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $perfil_id
 * @property-read Collection|CompraUsuario[] $compraUsuario
 * @property-read int|null $compra_usuario_count
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Perfil|null $perfil
 * @property-read Collection|Produto[] $produto
 * @property-read int|null $produto_count
 * @property-read Collection|PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static UserFactory factory(...$parameters)
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereBairro($value)
 * @method static Builder|User whereComplemento($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereImagem($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User whereNumero($value)
 * @method static Builder|User whereObservacao($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User wherePerfilId($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereRua($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'observacao',
        'imagem',
        'endereco',
        'rua',
        'numero',
        'complemento',
        'perfil_id',
        'bairro',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasMany
     */
    public function compraUsuario(): HasMany
    {
        return $this->hasMany(CompraUsuario::class);
    }

    /**
     * @return HasMany
     */
    public function produto(): HasMany
    {
        return $this->hasMany(Produto::class);
    }

    /**
     * Método para pegar o perfil do usuário
     *
     * @return BelongsTo
     */
    public function perfil(): BelongsTo
    {
        return $this->belongsTo(Perfil::class);
    }
}
