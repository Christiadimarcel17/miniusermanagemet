<?php


namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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


        Gate::define('isAdmin',function($user){
            $username1 = Auth::user();
            $username = $username1['name'];
            $role = User::where('name','=',$username)->first();
            if($role){
                if($role->role == 'admin'){
                    return true;
                }
            }
            return false;
        });
        Gate::define('isSuperAdmin',function($user){
            $username1 = Auth::user();
            $username = $username1['name'];
            $role = User::where('name','=',$username)->first();
            if($role){
                if($role->role == 'superadmin'){
                    return true;
                }
            }
            return false;
        });

        Gate::define('isUser',function($user){
            $username1 = Auth::user();
            $username = $username1['name'];
            $roleuser = User::where('name','=',$username)->first();
            if($roleuser){
                if($roleuser->role == 'user'){
                    return true;
                }
            }
            return false;
        });

    }
}
