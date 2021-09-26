<?php
namespace App\View\Buttons;

class ButtonShow extends Button
{
    /**
     * ButtonShow constructor.
     * @param string $permission
     * @param string $url
     * @param array $classes
     * @param array $attributes
     */
    public function __construct(string $permission, string $url, array $classes = [], array $attributes = [])
    {
        parent::__construct(
            $permission,
            $url,
            "fa fa-eye",
            Button::METHOD_GET,
            "Visualizar",
            array_merge(['btn-warning'], $classes),
            $attributes
        );
    }

    /**
     * Método para criar um button show
     *
     * @param string $permission
     * @param string $url
     * @param array $classes
     * @param array $attributes
     * @return ButtonShow
     */
    public static function make(string $permission, string $url, array $classes = [], array $attributes = []): ButtonShow
    {
        return new ButtonShow($permission, $url, $classes, $attributes);
    }
}
