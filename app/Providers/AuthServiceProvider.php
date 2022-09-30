<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // システム管理者のみ許可
        Gate::define('root', function ($user) {
            return ($user->role_id === 1);
        });

        // サイト管理者のみ許可
        Gate::define('admin', function ($user) {
            return ($user->role_id === 2);
        });

        // 登録ユーザーのみ許可
        Gate::define('user', function ($user) {
            return ($user->role_id === 3);
        });

        // 閲覧ユーザーのみ許可
        Gate::define('visitor', function ($user) {
            return ($user->role_id === 4);
        });

        // ゲストのみ許可
        Gate::define('guest', function ($user) {
            return ($user->role_id === 5);
        });

        // 登録ユーザー以上の権限のみ許可
        Gate::define('isOverUser', function ($user) {
            return ($user->role_id < 4);
        });
    }
}
