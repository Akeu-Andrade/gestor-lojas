<?php

namespace App\Models;

use App\Business\Auth\Models\UserSyncHistory;
use App\Business\Produto\Models\CompraUsuario;
use App\Business\Produto\Models\Produto;
use App\Business\Seguranca\Models\Perfil;
use App\Modules\Actions\GroupAction;
use App\Modules\Module;
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

    protected $appends = [
      'count_carrinho'
    ];

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

    public function getCountCarrinhoAttribute()
    {
        return 1;
    }

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

    /**
     * Método para pegar todas a ações registradas
     *
     * @return array
     */
    public function getTodasAcoes(): array
    {
        $modules = config('modules');

        $todasAcoes = [];
        /**
         * @var Module $module
         */
        foreach ($modules as $module) {
            $module = new $module();
            if ($module->groupActions() == null) {
                continue;
            }

            /**
             * @var GroupAction $groupAction
             */
            foreach ($module->groupActions() as $groupAction) {
                $todasAcoes = array_merge($todasAcoes, $groupAction->getArrayActions());
            }
        }

        return $todasAcoes;
    }

    /**
     * Método para verificar se o usuário tem permissão na web
     *
     * @param string $permission
     * @return bool
     */
    public function hasPermission(string $permission): bool{
        $permission = explode('\\', $permission);
        $permission = strtolower(end($permission));

        $todasAcoes = $this->getTodasAcoes();

        if (!in_array($permission, $todasAcoes)) {
            return true;
        }

//        if (!$this->perfil->hasAction($permission)) {
//            return false;
//        }

        return true;
    }

    /**
     * Método para verificar se o usuário tem permissão para um relatório
     *
     * @param string $permission
     * @return bool
     */
    public function hasAccessToReport(string $permission): bool{
        $permission = strtolower($permission);

        if (!in_array($permission, $this->perfil->getAllowedReports())) {
            return false;
        }

        return true;
    }
}
