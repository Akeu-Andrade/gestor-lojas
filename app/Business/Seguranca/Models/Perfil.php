<?php

namespace App\Business\Seguranca\Models;

use App\Models\UserLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Business\Seguranca\Models\Perfil
 *
 * @property int $id
 * @property string $name
 * @property string|null $observacao
 * @property array|null $actions
 * @property array|null $reports
 * @property array|null $actions_api
 * @property int|null $user_id_cadastro
 * @property int|null $user_id_alteracao
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User|null $userAlteracao
 * @property-read User|null $userCadastro
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil newQuery()
 * @method static Builder|Perfil onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil query()
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereActions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereActionsApi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereObservacao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereReports($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereUserIdAlteracao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereUserIdCadastro($value)
 * @method static Builder|Perfil withTrashed()
 * @method static Builder|Perfil withoutTrashed()
 * @mixin \Eloquent
 */
class Perfil extends Model
{
    use SoftDeletes;
    use UserLog;

    protected $fillable = [
        'nome',
        'observacao',
        'actions',
        'actions_api',
        'reports',
        'user_id_alteracao',
        'user_id_cadastro'
    ];

    protected $casts = [
        'actions' => 'array',
        'actions_api' => 'array',
        'reports' => 'array',
    ];

    public function getAllowedActions(): array
    {
        if (!empty($this->actions)) {
            return json_decode((string) $this->actions, true);
        } else {
            return [];
        }
    }

    public function getAllowedActionsApi(): array
    {
        if (!empty($this->actions_api)) {
            return json_decode($this->actions_api, true);
        } else {
            return [];
        }
    }

    public function getAllowedReports(): array
    {
        if (!empty($this->reports)) {
            return json_decode($this->reports, true);
        } else {
            return [];
        }
    }

    public function hasAction(string $action): bool
    {
        return in_array(strtolower($action), $this->getAllowedActions());
    }

    public function hasActionApi(string $actionApi): bool
    {
        return in_array(strtolower($actionApi), $this->getAllowedActionsApi());
    }

    public function hasReport(string $report): bool
    {
        return in_array(strtolower($report), $this->getAllowedReports());
    }
}
