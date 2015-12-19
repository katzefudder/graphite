<?php

namespace Katzefudder\Graphite;

use Illuminate\Support\ServiceProvider;

class GraphiteServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
		// Publish a config file
		$this->publishes([
			__DIR__.'/../../config/graphite.php' => config_path('graphite.php'),
		], 'config');
	}

 /**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
		$this->app->bind(
			'graphite',
			'Katzefudder\Graphite\GraphiteSender'
		);
	}
}