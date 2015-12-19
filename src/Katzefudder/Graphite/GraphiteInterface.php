<?php
namespace Katzefudder\Graphite;


interface GraphiteInterface {
	public function send($name, $message);
}