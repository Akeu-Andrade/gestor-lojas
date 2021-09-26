<?php


namespace App\View\Menu;


use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class RenderMenu
{
    /**
     * @var Collection
     */
    protected $menu;

    public static function make(): RenderMenu
    {
        return new RenderMenu();
    }

    public function render(): string
    {
        $this->menu = $this->getMenu();

        /**
         * @var User $user
         */
        $user = Auth::user();
        $menuObj = new Menu($this->menu, $user);

        return $menuObj->render();
    }

    /**
     * @return Collection
     */
    protected function getMenu(): Collection
    {

        if(config('app.env') === 'production')
        {
            $menu = Cache::remember('menu', 3600 * 24, function () {
                return $this->collectMenu();
            });
        }
        else {
            $menu = $this->collectMenu();
        }

        return empty($menu) ? collect() : $menu;
    }

    /**
     * @return Collection
     */
    private function collectMenu(): Collection
    {
        return collect(config("menu.headers"))->map(function ($menu) {
            return new $menu();
        });
    }
}
