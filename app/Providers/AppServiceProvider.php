<?php

namespace App\Providers;

use App\Models\ProgramService;
use App\Models\User;
use App\Observers\TeacherObserver;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
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
        User::observe(TeacherObserver::class);
        Gate::define('admin', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('teacher', function (User $user) {
            return $user->role === 'teacher';
        });

        Gate::define('student', function (User $user) {
            return $user->role === 'student';
        });

        Gate::define('all-users', function (User $user) {
            return in_array($user->role, ['admin', 'teacher', 'student']);
        });

        View::composer('*', function ($view) {
            $dropdownProgramServices = ProgramService::where('show_in_dropdown', true)
                ->orderBy('name')
                ->get(['id', 'name', 'slug', 'hero_text', 'hero_image']);

            $view->with('dropdownProgramServices', $dropdownProgramServices);
        });

        Route::bind('programServiceById', function ($value) {
            return ProgramService::findOrFail($value);
        });
    }
}
