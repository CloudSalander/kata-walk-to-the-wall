<?php 

class Player {

	private string $name;
	private int $x;
	private int $y;

	public function __construct(string $name){
		$this->name = $name;
		$this->x = 0;
		$this->y = 0;
	}

	public function getX(): int {
		return $this->x;
	}

	public function getY(): int {
		return $this->y;
	}
}
?>