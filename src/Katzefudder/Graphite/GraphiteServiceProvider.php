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
		//
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
