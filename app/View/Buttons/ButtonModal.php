<?php
namespace App\View\Buttons;

class ButtonModal extends Button
{
    /**
     * ButtonModal constructor.
     * @param string $permission
     * @param string $url
     * @param string $icon
     * @param string $title
     * @param array $classes
     * @param array $attributes
     */
    public function __construct(string $permission, string $url, string $icon, string $title, array $classes = [], array $attributes = [])
    {
        parent::__construct(
            $permission,
            "#/$url",
            $icon,
            Button::METHOD_GET,
            $title,
            $classes,
            array_merge(['open-modal' => $url], $attributes)
        );
    }

    /**
     * @param string $permission
     * @param string $url
     * @param string $icon
     * @param string $title
     * @param array $classes
     * @param array $attributes
     * @return ButtonModal
     */
    public static function make(string $permission, string $url, string $icon, string $title, array $classes = [], array $attributes = []): ButtonModal
    {
        return new ButtonModal($permission, $url, $icon, $title, $classes, $attributes);
    }
}
