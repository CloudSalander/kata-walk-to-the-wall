<?php
class Timer {

	private const  TIME_LIMIT = 5;	//Seconds
	private const  TIME_LIMIT_MSG = "Time is over!";

	private int $begin_time;
	private int $current_time;

	public function __construct() {
		$this->begin_time = time();
	}

	public function isTimeFinished(): bool {
		$this->current_time = time();
		if(($this->current_time - $this->begin_time) > self::TIME_LIMIT) {
			echo self::TIME_LIMIT_MSG.PHP_EOL;
			return true;
		}
		return false;
	}
}
?>