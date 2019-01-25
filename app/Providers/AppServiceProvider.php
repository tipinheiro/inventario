<?php

namespace inventario\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use inventario\User;
use inventario\Equipamento;
use inventario\acessorios;
use inventario\manutencao;
use inventario\OrdemServico;

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

            $event->menu->add([
                'text'        => 'Equipamentos',
                'url'         => 'equipamentos',
                'icon'        => 'desktop',
                'label'       =>  Equipamento::count(),
                'label_color' => 'success',
            ],
            [
                'text'        => 'Acessórios',
                'url'         => 'acessorios',
                'icon'        => 'desktop',
                'label'       =>  acessorios::count(),
                'label_color' => 'success',
            ],
            [
                'text'        => 'Manutenção',
                'url'         => 'manutencao',
                'icon'        => 'wrench',
                'label'       =>  manutencao::count(),
                'label_color' => 'success',
            ],
            [
                'text'        => 'Ordem',
                'url'         => 'ordems',
                'icon'        => 'wrench',
                'label'       =>  OrdemServico::count(),
                'label_color' => 'success',
            ]
          );

            $event->menu->add('Contas');
            $event->menu->add([
                'text'        => 'Users',
                'url'         => '/home',
                'icon'        => 'users',
                'label'       =>  User::count(),
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
