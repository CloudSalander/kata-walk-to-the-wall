<?php
define("GAME_MESSAGE","C'mon! Let's move!");
define("AVAILABLE_MOVES", ['0-EXIT','1-Up','2-Down','3-Right','4-Left']);
define("BOARD_ROWS",5);
define("BOARD_COLUMNS",8);

include_once('class/Move.php');
include_once('class/Board.php');

$move = Move::UP;
$board = new Board(BOARD_ROWS,BOARD_COLUMNS);

while($move != Move::EXIT) {
    writeAvailableMoves();
    $move = readline();
    if(isRightMove($move)) {
        $move = generateMove(intval($move));
        $board->draw();
    }
}

function writeAvailableMoves(): void {
    echo GAME_MESSAGE.PHP_EOL;
	foreach(AVAILABLE_MOVES as $available_move) {
		echo $available_move.PHP_EOL;
	}
}

function isRightMove(string $move): bool {
	if(is_numeric($move) && ($move >= 0 && $move < 5)) return true;
	return false;
}

function generateMove(int $move): Move {
	return match($move) {
        0 => Move::EXIT,
		1 => Move::UP,
		2 => Move::DOWN,
		3 => Move::LEFT,
		4 => Move::RIGHT
	};
}



?>