<?php 

function fillTemplateAndGetPage($buttonText = 'СТАРТ', $turn = '', $result = '', $isGameActive = false)
{
    global $game;
    global $pageTemplate;

    $gameState = $game->getState();
    $gameField = fillGameField($gameState, $isGameActive);

    $page = str_replace('{button-text}', $buttonText, $pageTemplate);
    $page = str_replace('{turn}', $turn, $page);
    $page = str_replace('{result}', $result, $page);
    $page = str_replace('{game-field}', $gameField, $page);

    return $page;
}