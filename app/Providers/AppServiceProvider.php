<?php

namespace App\Providers;

<<<<<<< HEAD
use App\Models\ProgramService;
use App\Models\User;
use App\Observers\TeacherObserver;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
=======
use App\Models\User;
use Illuminate\Support\Facades\Gate;
>>>>>>> 6d7dd8f8aefc7d42a2061548f00c21b62dff71ef
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
<<<<<<< HEAD
        User::observe(TeacherObserver::class);
=======
>>>>>>> 6d7dd8f8aefc7d42a2061548f00c21b62dff71ef
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
<<<<<<< HEAD

        View::composer('*', function ($view) {
            $dropdownProgramServices = ProgramService::where('show_in_dropdown', true)
                ->orderBy('name')
                ->get(['id', 'name', 'slug', 'hero_text', 'hero_image']);

            $view->with('dropdownProgramServices', $dropdownProgramServices);
        });
=======
>>>>>>> 6d7dd8f8aefc7d42a2061548f00c21b62dff71ef
    }
}
