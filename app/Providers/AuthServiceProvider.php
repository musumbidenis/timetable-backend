<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Imanghafoori\HeyMan\Facades\HeyMan;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // /*Check if user is logged in*/
        // HeyMan::whenYouVisitUrl(['/home', '/course', '/session', '/unit/upload', '/session/upload'])
        //     ->sessionShouldHave('admissionkey')
        //     ->otherwise()
        //     ->redirect()
        //     ->to('/');
    }
}
