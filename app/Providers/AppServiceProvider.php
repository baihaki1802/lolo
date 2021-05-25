<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{

 public function register()
 {
 //
 }
 public function boot(Dispatcher $events)
 {
    Schema::defaultStringLength(191);
    $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
    $roles_id = Auth::user()->roles->name;
    $event->menu->add('MENU');
    if ($roles_id=='Admin') {
        $event->menu->add(
            [
                    'text'        => 'Dashboard',
                    'url'         => '/',
                    'icon'        => 'fas fa-fw fa-home',
                   
                ],
            [
                'text' => 'User',
                'url' => 'user',
                'icon' => 'fas fa-fw fa-user-tie'
            ],
            [
                'text' => 'Pengelolaan Barang',
                'url' => 'product',
                'icon' => 'fas fa-fw fa-archive'
            ],
            [
                'text' => 'Kategori Barang',
                'url' => 'categorie',
                'icon' => 'fas fa-fw fa-folder'
            ],
            [
                'text' => 'Merek Barang',
                'url' => 'brand',
                'icon' => 'fas fa-fw fa-suitcase'
            ],
            

            [
                'text' => 'Transaksi',
                'url' => 'transaksi',
                'icon' => 'fas fa-fw fa-cash-register'
            ],
            [
                'text'    => 'Laporan',
                'icon'    => 'fas fa-fw fa-book',
                'submenu' => [
                    [
                        'text' => 'Laporan Barang Masuk',
                        'url'  => 'laporan',
                    ],
                    [
                        'text'    => 'Laporan Barang Keluar',
                        'url'     => 'laporan',
                    ],
                ],
            ],
        );
    }
    else if ($roles_id=='User') {
        $event->menu->add(
            [
                'text' => 'Barang',
                'url' => 'product',
                'icon' => 'fas fa-fw fa-archive'
            ],
            [
                'text' => 'Pembayaran',
                'url' => '#',
                'icon' => 'fas fa-fw fa-cash-register'
            ],
            [
                'text' => 'History Pembayaran',
                'url' => '#',
                'icon' => 'fas fa-fw fa-history'
            ]
        );
    }
    else {
        $event->menu->add(
            [
                'text' => 'History Pembayaran',
                'url' => 'history',
                'icon' => 'fas fa-fw fa-history'
            ]
        );
    }
 
});
}   
} 