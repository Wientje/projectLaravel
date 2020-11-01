<?php

namespace App\Providers;

use App\Models\CarItem;
use App\Models\User;
use App\Policies\AdminPolicy;
use App\Policies\CarPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        CarItem::class => CarPolicy::class,
        User::class => AdminPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::define('viewCars', function (User $user, CarItem $carItem){
//            return $user->id === $carItem->user_id;
//        });

        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
        });

        /* define a user role */
        Gate::define('isUser', function($user) {
            return $user->role == 'user';
        });

        Gate::define('view-car', function ($user, $carItem) {

            //return true;
            return $user->id === $carItem->user_id;
           // return $user->id === 2;
        });
    }
}
