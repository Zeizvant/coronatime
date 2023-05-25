<?php

namespace App\Providers;

use App\Services\CountryService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register(): void
	{
		$this->app->bind(CountryService::class, function ($app) {
			return new CountryService();
		});
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
	}
}
