<?php

namespace App\Business;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Business\BaseModel
 *
 * @method static Builder|BaseModel newModelQuery()
 * @method static Builder|BaseModel newQuery()
 * @method static Builder|BaseModel query()
 */
class BaseModel extends Model
{
    /**
     * @return mixed|User
     */
    public function userCreate(): User
    {
        return $this->belongsTo(User::class,'user_id_cadastro')->withTrashed()->first();
    }

    /**
     * @return mixed|User
     */
    public function userUpdate(): User
    {
        return $this->belongsTo(User::class,'user_id_alteracao')->withTrashed()->first();
    }
}
