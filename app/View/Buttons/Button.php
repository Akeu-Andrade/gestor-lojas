<?php


namespace App\View\Buttons;

use App\Models\User;

class Button
{
    const METHOD_GET = "method_get";
    const METHOD_DELETE = "method_delete";
    const METHOD_POST = "method_post";
    const METHOD_DELETE_WITH_AJAX = "method_delete_with_ajax";

    private $url;
    private $icon;
    private $method;
    private $title;
    private $mensagemConfirmation;
    private $classes;
    private $attributes;
    private $permission;

    /**
     * Button constructor.
     * @param String $url
     * @param String $icon
     * @param String $method
     * @param String $title
     * @param array $classes
     * @param array $attributes
     * @param string $permission
     */
    public function __construct(string $permission, string $url, string $icon, string $method, string $title, array $classes = [], array $attributes = [])
    {
        $this->permission = $permission;
        $this->url = $url;
        $this->icon = $icon;
        $this->method = $method;
        $this->title = $title;
        $this->classes = $classes;
        $this->attributes = $attributes;
    }

    /**
     * @param mixed $mensagemConfirmation
     */
    public function setMensagemConfirmation($mensagemConfirmation): void
    {
        $this->mensagemConfirmation = $mensagemConfirmation;
    }

    public function get()
    {

        /**
         * @var User $user
         */
        $user = \Auth::user();

        if ($user->hasPermission($this->permission)) {
            return \view($this->getLayout(), [
                "url" => $this->url,
                "icon" => $this->icon,
                "title" => $this->title,
                "message" => $this->mensagemConfirmation,
                "classes" => collect($this->classes)->implode(' '),
                "attributes" => $this->formateAttributes($this->attributes),
            ]);
        }

        return null;
    }

    public function render(): string
    {
        return $this->get() != null ? $this->get()->render() : '';
    }

    private function getLayout(): string
    {
        if ($this->method == self::METHOD_GET) {
            return "components.buttons.get";
        } elseif ($this->method == self::METHOD_DELETE) {
            return "components.buttons.delete";
        } elseif ($this->method == self::METHOD_DELETE_WITH_AJAX) {
            return "components.buttons.delete_ajax";
        } elseif ($this->method == self::METHOD_POST) {
            return "components.buttons.post";
        }
    }

    /**
     * @param array $attributes
     * @return string
     */
    protected function formateAttributes(array $attributes = []): string
    {
        $strAttributes = "";

        foreach ($attributes as $attribute => $value) {
            $strAttributes .= "$attribute=$value ";
        }

        return $strAttributes;
    }
}
