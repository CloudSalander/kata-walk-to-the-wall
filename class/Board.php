<?php

class Board {
	
	private const FREE_SQUARE = ".";
	private const WALL_SQUARE =  "#"; 
	private const WALL_FACTOR = 1;
	
	private int $rows;
	private int $columns;
	private array $box_values;

	public function __construct(int $rows,int $columns) {
		$this->rows = $rows;
		$this->columns = $columns;
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
			$this->box_values[$row][$column] = $this->getCharToPrint();
		}
	}



	public function draw():void {
		for($row = 0; $row < $this->rows; ++$row) {
			$this->drawRow($row);
		}  	
	}

    private function drawRow(int $row): void {
		for($column = 0; $column < $this->columns; ++$column) {
			echo $this->box_values[$row][$column];
		}
		echo PHP_EOL;
	}

	private function getCharToPrint(): string {
		$random =  rand(1,5);
		$char_to_print = ".";
		if($random == self::WALL_FACTOR) $char_to_print = "#";
		return $char_to_print;
	} 
}
?>