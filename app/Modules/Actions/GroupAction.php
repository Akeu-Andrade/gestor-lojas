<?php


namespace App\Modules\Actions;


use Illuminate\Support\Collection;

class GroupAction
{
    /**
     * @var string $name
     */
    private $name;

    /**
     * @var Collection
     */
    private $actions;

    /**
     * GroupAction constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->actions = new Collection();
    }

    /**
     * @param Action $action
     * @return string
     */
    public function addAction(Action $action): string
    {
        return $this->actions->add($action);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Collection
     */
    public function getActions(): Collection
    {
        return $this->actions;
    }

    public function getArrayActions(): array
    {
        $actions = [];
        /**
         * @var Action $action
         */
        foreach ($this->actions as $action) {
            $actions[] = $action->getAction();
        }

        return $actions;
    }
}
