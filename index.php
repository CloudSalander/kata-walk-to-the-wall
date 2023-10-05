<?php
define("GAME_MESSAGE","C'mon! Let's move!");
define("AVAILABLE_MOVES", ['0-EXIT','W-Up','S-Down','A-Right','D-Left']);
define("BOARD_ROWS",5);
define("BOARD_COLUMNS",8);

include_once('class/Move.php');

$move = Move::UP;

while($move != Move::EXIT) {
    writeAvailableMoves();
    break;   
}

function writeAvailableMoves(): void {
    echo GAME_MESSAGE.PHP_EOL;
	foreach(AVAILABLE_MOVES as $available_move) {
		echo $available_move.PHP_EOL;
	}
}



?>