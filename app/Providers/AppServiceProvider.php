<?php

namespace App\Providers;

use App\Models\Role;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder; // Import Builder where defaultStringLength method is defined
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;

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
        Builder::defaultStringLength(191); // Update defaultStringLength
        Schema::enableForeignKeyConstraints();
        $roles = Role::with('permissions')->get();
        $permissionsArray = [];
        foreach ($roles as $role) {
            foreach ($role->permissions as $permissions) {
                $permissionsArray[$permissions->title][] = $role->id;
            }
        }

        // Every permission may have multiple roles assigned
        foreach ($permissionsArray as $title => $roles) {
            Gate::define($title, function ($user) use ($roles) {
                // We check if we have the needed roles among current user's roles
                return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
            });
        }
    }
}
