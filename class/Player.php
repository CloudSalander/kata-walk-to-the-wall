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
		if($this->canMoveUp()) --$this->x;
	}

	private function canMoveUp(): bool {;
		if($this->x - 1 >= 0) return true;
		return false;
	}

	public function moveDown(int $rows): void {
		if($this->canMoveDown($rows)) ++$this->x;
	}

	private function canMoveDown(int $rows): bool {
		if($this->x + 1 >= $rows) return false;
		return true;
	}

	public function moveLeft(): void {
		if($this->canMoveLeft()) --$this->y;
	}

	private function canMoveLeft(): bool {
		if($this->y - 1 >= 0) return true;
		return false;
	}

	public function moveRight(int $columns): void {
		if($this->canMoveRight($columns))++$this->y;
	}

	private function canMoveRight(int $columns): bool {
		if($this->y + 1 >= $columns) return false;
		return true;
	}
}
?>