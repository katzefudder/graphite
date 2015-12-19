<?php
namespace Katzefudder\Graphite;
use Illuminate\Support\Facades\Facade;

class GraphiteFacade extends Facade {
	protected static function getFacadeAccessor() {
		return 'GraphiteSender';
	}
}