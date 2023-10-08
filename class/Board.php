<?php

class Board {
	
	private const  FREE_SQUARE = ".";
	private const  WALL_SQUARE =  "#"; 
	private const  PLAYER_SQUARE = "P";
	private const  WALL_FACTOR = 1;
	private const  DEFAULT_PLAYER_NAME = "Theseus";
	private const  VICTORY_MSG = "You won!"; 
	
	private int $rows;
	private int $columns;
	private array $box_values;
	private Player $player;
	private bool $first_move;

	public function __construct(int $rows,int $columns) {
		$this->rows = $rows;
		$this->columns = $columns;
		$this->player = new Player(self::DEFAULT_PLAYER_NAME);
		$this->first_move = true;
		$this->generateBoxValues();
		$this->draw();
	}

	private function generateBoxValues(): void {
		for($row = 0; $row < $this->rows; ++$row) {
			$this->generateBoxValuesRow($row);
		}
	}

	private function generateBoxValuesRow(int $row): void {
		for($column = 0; $column < $this->columns; ++$column) {
			if($this->isPlayerInBox($row,$column)) {
				$this->box_values[$row][$column] = self::PLAYER_SQUARE;
			}  
			else {
				$this->box_values[$row][$column] = $this->getCharToPrint();
			}
		}
	}

	private function isPlayerInBox(int $row, int $column): bool {
		if($row == $this->player->getX() && $column == $this->player->getY()) return true;
		return false; 
	}

	public function play(Move $move): void {
		$this->movePlayer($move);
		if($this->first_move) $this->resetFirstBox();
		$this->draw();
	}

	public function resetFirstBox() {
		$this->box_values[0][0] = self::FREE_SQUARE;
		$this->first_move = false;
	}

	private function movePlayer(Move $move): void {
		switch ($move) {
			case MOVE::UP:
				if($this->canMove(-1,0)) $this->player->moveUp();
				break;
			case MOVE::DOWN:
				if($this->canMove(1,0)) $this->player->moveDown();
				break;
			case MOVE::LEFT:
				if($this->canMove(0,-1)) $this->player->moveLeft();
				break;
			case MOVE::RIGHT:
				if($this->canMove(0,1)) $this->player->moveRight();
				break;
			default:
				break;
		}
	}

	private function canMove(int $row_variation,int $column_variation): bool {
		$new_x = $this->player->getX() + $row_variation;
		$new_y = $this->player->getY() + $column_variation;
		return $this->isInBoard($new_x,$new_y) && $this->hasNoWallInBox($new_x,$new_y);
 	}

 	private function isInBoard(int $new_x,int $new_y): bool {
 		return ($new_x >= 0 and $new_x < $this->rows) && 
 			   ($new_y >= 0 and $new_y < $this->columns);
 	}

 	private function hasNoWallInBox(int $new_x,int $new_y): bool {
 		return $this->box_values[$new_x][$new_y] !== self::WALL_SQUARE;
 	}

	private function draw(): void {
		for($row = 0; $row < $this->rows; ++$row) {
			$this->drawRow($row);
		}  	
	}

    private function drawRow(int $row): void {
		for($column = 0; $column < $this->columns; ++$column) {
			if($this->isPlayerInBox($row,$column)) echo self::PLAYER_SQUARE;
			else echo $this->box_values[$row][$column];
		}
		echo PHP_EOL;
	}

	private function getCharToPrint(): string {
		$random =  rand(1,5);
		$char_to_print = ".";
		if($random <= self::WALL_FACTOR) $char_to_print = self::WALL_SQUARE;
		return $char_to_print;
	}

	public function gameIsOver(): bool {
		if($this->player->getX() == $this->rows-1) {
			echo self::VICTORY_MSG;
			return true;
		}
		return false;
	} 
}
?>