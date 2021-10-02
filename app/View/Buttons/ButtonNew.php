<?php
namespace App\View\Buttons;

class ButtonNew extends Button
{
    /**
     * ButtonNew constructor.
     * @param string $permission
     * @param string $url
     * @param array|null $classes
     * @param array|null $attributes
     */
    public function __construct(string $permission, string $url, ?array $classes = [], ?array $attributes = [])
    {
        parent::__construct($permission, $url, "add", Button::METHOD_GET, "Novo", ['btn-success'], $attributes = []);
    }

    /**
     * Função para gerar uma objeto do tipo ButtonNew
     *
     * @param string $permission
     * @param string $url
     * @param array|null $classes
     * @param array|null $attributes
     * @return ButtonNew
     */
    public static function make(string $permission, string $url, ?array $classes = [], ?array $attributes = []): ButtonNew
    {
        return new ButtonNew($permission, $url, $classes, $attributes);
    }
}
