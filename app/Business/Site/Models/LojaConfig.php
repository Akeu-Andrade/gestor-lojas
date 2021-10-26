<?php

namespace App\Business\Site\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Business\Seguranca\Models\LojaConfig
 *
 * @property int $id
 * @property string $nome
 * @property string|null $cor
 * @property string|null $cor_dois
 * @property string|null $logo
 * @property string|null $banner
 * @property string|null $descricao
 * @property string|null $numero
 * @property string|null $link_whatsapp
 * @property string|null $link_instagram
 * @property string|null $outro_link
 * @property string|null $pagina_web
 * @property string|null $link_app
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LojaConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LojaConfig newQuery()
 * @method static Builder|LojaConfig onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|LojaConfig query()
 * @method static \Illuminate\Database\Eloquent\Builder|LojaConfig whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LojaConfig whereCor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LojaConfig whereCorDois($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LojaConfig whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LojaConfig whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LojaConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LojaConfig whereLinkApp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LojaConfig whereLinkInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LojaConfig whereLinkWhatsapp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LojaConfig whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LojaConfig whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LojaConfig whereNumero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LojaConfig whereOutroLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LojaConfig wherePaginaWeb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LojaConfig whereUpdatedAt($value)
 * @method static Builder|LojaConfig withTrashed()
 * @method static Builder|LojaConfig withoutTrashed()
 * @mixin Eloquent
 */
class LojaConfig extends Model
{
    use SoftDeletes;
    CONST DIR_FOTO = "lojaconfig/imagem/";

    protected $fillable = [
        'nome',
        'cor',
        'cor_dois',
        'logo',
        'banner',
        'descricao',
        'numero',
        'link_whatsapp',
        'link_instagram',
        'outro_link',
        'pagina_web',
        'link_app',
    ];

    public function getCaminhoLogo()
    {
        if (empty($this->logo)) {
            return "";
        }
        return asset("storage/".self::DIR_FOTO.$this->logo);
    }

    public function getCaminhoBanner()
    {
        if (empty($this->banner)) {
            return "";
        }
        return asset("storage/".self::DIR_FOTO.$this->banner);
    }

}
