<?php


namespace App\Business\Seguranca\Requests;


use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string nome
 * @property string observacao
 * @property array acoes
 */
class SavePerfilRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "nome" => ["required", "string"],
            "observacao" => ["nullable", "string"],
            "acoes" => ["array"]
        ];
    }
}
