<?php 
session_start();

require './Game_Model.php';
require './fillGameField.php';
require './fiilTemplateAndGetPage.php';

if (isset($_SESSION['game-state'])) {
    $game = new Model_Game($_SESSION['game-state']);
} else {
    $game = new Model_Game();
}

$pageTemplate = file_get_contents('./game-page-template.php');

$turn = ($_SESSION['counter'] % 2 == 0) ? "<h5>Ход первого игрока!</h5>" : "<h5>Ход второго игрока!</h5>";

// если в сессию передано игровове состояние
// то игра либо будет завершена
// либо продолжается
if (isset($_SESSION['game-state'])) {
    $_SESSION['counter']++;

    $lastTurn = explode(',', $_POST['position']);
    
    $game->set_o_or_x_in_state($lastTurn, $_SESSION['counter']);

    if ($game->checkWinner($_SESSION['counter'])) {
        unset($_SESSION['counter']);

        $page = fillTemplateAndGetPage('РЕСТАРТ', '', "<h5>Result of game: {$game->getWinner()}</h5>");

        unset($_SESSION['game-state']);
    } else {
        $page = fillTemplateAndGetPage('РЕСТАРТ', $turn, '', true);

        $_SESSION['game-state'] = $game->getState();
    }

// если в посте есть старт
// то игра только началась
} else if (isset($_POST['start']) && $_POST['start'] === 'on') {
    $_SESSION['counter'] = 1;

    $page = fillTemplateAndGetPage('РЕСТАРТ', $turn, '', true);

    $_SESSION['game-state'] = $game->getState();
// иначе получаем дефолтную страницу
} else {
    $page = fillTemplateAndGetPage();
}

print($page);

?>