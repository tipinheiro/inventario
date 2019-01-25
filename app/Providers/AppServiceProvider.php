<?php

namespace inventario\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use inventario\Equipamento;
use inventario\acessorios;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add('MAIN NAVIGATION');
            $event->menu->add([
                'text'        => 'Users',
                'url'         => 'admin/users',
                'icon'        => 'users',
                'label'       =>  Equipamento::count(),
                'label_color' => 'success',
            ]);

            $event->menu->add('MAIN NAVIGATION 2');
            $event->menu->add([
                'text'        => 'Users',
                'url'         => 'admin/users',
                'icon'        => 'users',
                'label'       =>  acessorios::count(),
                'label_color' => 'success',
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
