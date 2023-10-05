<?php

class Board {
	
	private const FREE_SQUARE = ".";
	private const WALL_SQUARE =  "#"; 
	
	private int $rows;
	private int $columns;

	public function __construct(int $rows,int $columns) {
		$this->rows = $rows;
		$this->columns = $columns;
	}

	public function draw():void {
		
	}

    private function drawRow(int $row): void {
		for($column = 0; $column < $this->columns; ++$column) {
			$char_to_print = Board::EMPTY_SQUARE;
		}
		echo PHP_EOL;
	}

	private function movePiece(Move $move): void {
		//Info: Decided that, if we arrive to the last row, can't move more
	
			
		}
	}
}
?>

?>