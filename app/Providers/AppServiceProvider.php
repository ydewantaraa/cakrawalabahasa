<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\TeacherObserver;
use Illuminate\Support\Facades\Gate;
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
    }
}
