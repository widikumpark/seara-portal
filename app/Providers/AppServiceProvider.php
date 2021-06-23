<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        // $this->loadHelpers();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        //Money Converter
        Blade::directive('money', function ($amount) {
            return "<?php echo '$' . number_format($amount, 2); ?>";
});
Blade::directive('moneyNoSign', function ($amount) {
return "<?php echo number_format($amount, 2); ?>";
});


Blade::directive('timeAgo', function ($date) {
return $diff = Carbon::now()->diffForHumans(Carbon::parse(strtotime($date)));
});

$events->listen(BuildingMenu::class, function (BuildingMenu $event) {
$hasNotifications = (auth()->user()->unreadNotifications->count()) > 0;
if ($hasNotifications) {
$userUnreadNotificationCount =auth()->user()->unreadNotifications->count();
}


$event->menu->addAfter('documents', [
'text' => 'notifications',
'url' => 'notifications',
'icon' => 'fas fa-fw fa-bell',
'label' => $hasNotifications ? $userUnreadNotificationCount : "",
'label_color' => $hasNotifications ? 'success':'',
], );
});
}
}