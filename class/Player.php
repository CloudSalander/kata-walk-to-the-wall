<?php 

class Player {

	private string $name;
	private int $x;
	private int $y;

	public function __construct(string $name) {
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

	public function moveUp(): void {
		 --$this->x;
	}

	public function moveDown(): void {
		echo "DWON".PHP_EOL;
		 ++$this->x;
	}

	public function moveLeft(): void {
	 	--$this->y;
	}

	public function moveRight(): void {
		++$this->y;
	}

}
?>