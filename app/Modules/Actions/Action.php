<?php


namespace App\Modules\Actions;


class Action
{
    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $action
     */
    private $action;

    /**
     * Action constructor.
     * @param string $name
     * @param string $action
     */
    public function __construct(string $name, string $action)
    {
        $this->name = $name;
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return strtolower($this->action);
    }
}
