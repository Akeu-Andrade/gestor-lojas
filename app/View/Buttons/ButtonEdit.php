<?php


namespace App\View\Buttons;

class ButtonEdit extends Button
{
    /**
     * ButtonEdit constructor.
     * @param string $permission
     * @param string $url
     * @param array|null $classes
     * @param array|null $attributes
     */
    public function __construct(string $permission, string $url, ?array $classes = [], ?array $attributes = [])
    {
        parent::__construct($permission, $url, 'fa fa-edit', Button::METHOD_GET, "Editar", $classes ?? [], $attributes ?? []);
    }

    /**
     * Função para criar um botão para edição
     *
     * @param string $permission
     * @param string $url
     * @param array|null $classes
     * @param array|null $attributes
     * @return ButtonEdit
     */
    public static function make(string $permission, string $url, ?array $classes = [], ?array $attributes = []): ButtonEdit
    {
        return new ButtonEdit($permission, $url, $classes, $attributes);
    }
}
