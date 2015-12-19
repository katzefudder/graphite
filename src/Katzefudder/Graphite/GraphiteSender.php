<?php

namespace Katzefudder\Graphite;

use Illuminate\Contracts\Config\Repository;

class GraphiteSender {

	private $config = null;

	public function __construct(Repository $config) {
		$this->config = $config;
	}

	public function sendToGraphite($message) {
		$endpoint = $this->config->get('graphite.graphite_host');
		$prefix = $this->config->get('graphite.graphite_prefix');
		$connection = fsockopen($endpoint, $this->config->get('graphite.graphite_port'));
		$message = $prefix.".$message ".time().PHP_EOL;
		fwrite($connection, $message);
		return fclose($connection);
	}
}