<?php

namespace Katzefudder\Graphite;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\Facades\Log;

class GraphiteSender {

	private $config = null;

	public function __construct(Repository $config) {
		$this->config = $config;
	}


	/**
	 * Data to send to Graphite host
	 * @param string $data
	 * @return bool
	 */
	public function sendToGraphite($data) {
        if (this->config->get('graphite.enabled') === false) return true;
        try {
            $endpoint = $this->config->get('graphite.graphite_host');
            $port = $this->config->get('graphite.graphite_port');

            $prefix = $this->config->get('graphite.graphite_prefix');
            $data = $prefix.".$data ".time().PHP_EOL;
            return $this->sendData($endpoint, $port, $data);
        } catch (\Exception $e) {
            \Log::info('sending to graphite failed: '.$e->getMessage());
            return false;
        }

	}


	/**
	 * @param string $endpoint
	 * @param string $data
	 * @return bool
	 */
	private function sendData($endpoint, $port, $data) {
		$connection = fsockopen($endpoint, $port);
		fwrite($connection, $data);
		return fclose($connection);
	}
}