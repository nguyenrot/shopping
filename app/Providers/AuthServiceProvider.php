<?php

namespace App\Providers;

use App\Models\products;
use App\Services\PermissionGateAndPolicyAccess;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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
//        $this->defineGateCategory();
        $permissionGateAndPolicy = new PermissionGateAndPolicyAccess();//Define permission
        $permissionGateAndPolicy->setGateAndPolicyAccess();
//        Gate::define('category-add', function ($user) {
//            return $user->checkPermissionAccess('category_add');
//        });
//
//        Gate::define('category-edit', function ($user) {
//            return $user->checkPermissionAccess('category_edit');
//        });

        Gate::define('menu-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list-menu'));
        });

        Gate::define('product-edit', function ($user,$id) {
            $products = products::find($id);
            if ($user->checkPermissionAccess('product_edit') && $user->id === $products->user_id){
                return true;
            }
            return false;
        });

        Gate::define('product-list', function ($user) {
            return $user->checkPermissionAccess('product_list');
        });



    }
    public function defineGateCategory(){
        Gate::define('category-list','App\Policies\CategoryPolicy@view');
        Gate::define('category-add','App\Policies\CategoryPolicy@create');
        Gate::define('category-edit','App\Policies\CategoryPolicy@update');
        Gate::define('category-delete','App\Policies\CategoryPolicy@delete');
    }
}
