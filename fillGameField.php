<?php 

function fillGameField(array $gameState, bool $isGameActive = false): string
{
    $gameField = '<form class="game-field" action="./index.php" method="post">';

    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            if ($isGameActive && strlen($gameState[$i][$j] > 0)) {
                $gameField .= "<button class=\"game-field__pos\" name=\"position\" value=\"$i,$j\" disabled>{$gameState[$i][$j]}</button>";
            } else if ($isGameActive) {
                $gameField .= "<button class=\"game-field__pos\" name=\"position\" value=\"$i,$j\">{$gameState[$i][$j]}</button>";
            } else {
                $gameField .= "<button class=\"game-field__pos\" name=\"position\" value=\"$i,$j\" disabled>{$gameState[$i][$j]}</button>";
            }
        }
    }
    $gameField .= "</form>";

    return $gameField;
}