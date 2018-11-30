<?php

namespace App\Providers;
//use App\Permission;

//use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Customer::class => CustomerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        
        //foreach ($this->getPermissions() as $permission) {
          //  $gate->define($permission->name, function($user) use ($permission) {
            //    return $user->hasRole($permission->roles);
            //});
        //}
        Gate::resource('customer', 'CustomerPolicy');

        Gate::define('create_customers', function($user){
            $user->hasAccess(['create_customers']);
        });

    }

    //protected function getPermissions()
    //{
      //  return Permission::with('roles')->get();
    //}
}
