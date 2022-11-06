<?php

function fillTemplateAndGetPage(string $buttonText = 'СТАРТ', $turn = '', $result = '', $isGameActive = false): string 
{
    global $game;
    global $pageTemplate;

    $gameState = $game->getState();
    $gameField = fillGameField($gameState, $isGameActive);

    $page = str_replace('{turn}', $turn, $pageTemplate);
    $page = str_replace('{result}', $result, $page);
    $page = str_replace('{game-field}', $gameField, $page);
    $page = str_replace('{button-text}', $buttonText, $page);

    return $page;
}

?>