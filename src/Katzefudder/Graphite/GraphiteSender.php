<?php

namespace Katzefudder\Graphite;

class GraphiteSender {
	public function sendToGraphite($message, $count = 1) {
		$endpoint = $this->config->get('graphite_host');
		$prefix = $this->config->get('graphite_prefix');
		$connection = fsockopen($endpoint, $this->config->get('graphite_port'));
		$message = $prefix.".$message $count ".time().PHP_EOL;
		fwrite($connection, $message);
		return fclose($connection);
	}
}