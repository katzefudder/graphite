<?php

/**
 * Created by PhpStorm.
 * User: flo
 * Date: 20.12.15
 * Time: 14:19
 */
class GraphiteSenderTest extends PHPUnit_Framework_TestCase {

	private $config = null;
	private $graphiteSender = null;

	public function setUp() {
		$this->config = Mockery::mock('Illuminate\Contracts\Config\Repository');
		$this->config->shouldReceive('get')->andReturn(false);

		$this->graphiteSender = Mockery::mock('Katzefudder\Graphite\GraphiteSender[sendData]', [$this->config]);
		$this->graphiteSender->shouldReceive('sendData')->once()->andReturn(true);
	}


	/**
	 * @test
	 */
	public function dataShouldBeSent() {
		$data = 'teststring';
		$result = $this->graphiteSender->sendToGraphite($data);
		$this->assertTrue($result);
	}
}