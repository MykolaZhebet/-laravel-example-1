<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Dedoc\Scramble\Scramble;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Dedoc\Scramble\Support\Generator\OpenApi;
use Illuminate\Http\Resources\Json\JsonResource;
use Dedoc\Scramble\Support\Generator\SecurityScheme;

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
        // Model::preventLazyLoading();

        // Paginator::useBoostrapFive();
        Gate::define('edit-job', function (User $user, Job $job) {
            return $job->employer->user->is($user);
        });
        //Disable wraping api response into "data" property
        // JsonResource::withoutWrapping();
        //Default throttling for '/api' route prefix is 60 requests per minute
        RateLimiter::for('api', function (Request $request) {
            return Limit::perminute(60)->by($request->user()?->id ?: $request->ip());
        });

        Scramble::afterOpenApiGenerated(function (OpenApi $openApi) {
            $openApi->secure(
                SecurityScheme::http('bearer', 'BearAuth')
            );
        });
    }
}
