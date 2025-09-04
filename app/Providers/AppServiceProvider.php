<?php
namespace App\Providers;

use App\Models\Program;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $setting  = Setting::first();
        $programs = Program::all();

        view()->share("setting", $setting);
        view()->share("programs", $programs);
    }
}
