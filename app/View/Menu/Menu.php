<?php


namespace App\View\Menu;


use App\Models\User;
use Illuminate\Support\Collection;

class Menu
{
    /**
     * @var Collection
     */
    private $itens;
    /**
     * @var User
     */
    private $user;

    /**
     * Menu constructor.
     * @param Collection $itens
     * @param User $user
     */
    public function __construct(Collection $itens, User $user)
    {
        $this->itens = $itens;
        $this->user = $user;
    }

    public function render(): string
    {
        $html = "<ul class='nav side-menu'>";
        /**
         * @var ItemMenu item
         **/
        foreach ($this->itens as $item) {
            $html .= $this->renderHeader($item);
        }

        $html .= "</ul>";

        return $html;
    }

    /**
     * @param ItemMenu $item
     * @return string
     */
    private function renderHeader(ItemMenu $item): string
    {
        if (!$item->userHasPermission($this->user)) {
            return "";
        }

        $html = "<li>";

        if ($item->hasSubMenu()) {

            $html .= "
                    <a href='#'>
                        <i class='{$item->getIcon()}'></i> {$item->getName()} <span class='fas fa-chevron-down'></span>
                    </a>
                    <ul class='nav child_menu'>";
            foreach ($item->getSubMenu() as $key => $subItem) {
                if (!$subItem->userHasPermission($this->user)) {
                    continue;
                }
                $html .= $this->renderItem($subItem);
            }
            $html .= "</ul>";
        } else {
            $html .= $this->renderItem($item);
        }

        $html .= "</li>";
        return $html;
    }

    /**
     * @param ItemMenu $item
     * @return string
     */
    private function renderItem(ItemMenu $item): string
    {
        return "
            <li class='nav-item'>
                <a href='" . url($item->getLink()) . "'>
                    <i class='" . $item->getIcon() . "'></i> " . $item->getName() . "
                </a>
            </li>";
    }
}

