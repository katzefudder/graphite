<?php
/**
 * Created by PhpStorm.
 * User: flo
 * Date: 19.12.15
 * Time: 11:10
 */

namespace Katzefudder\Graphite;


trait GraphiteSender {
	public function sendToGraphite() {
		$this->send();
	}
}