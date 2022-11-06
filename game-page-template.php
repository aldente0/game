<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Крестики нолики</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    
<h1>Игра Крестики Нолики</h1>
<h3>Для начала нажмите СТАРТ</h3>
<div class="explanation">Игра рассчитана на 2 двоих человек</div>

<form action="./index.php" method="post">
    <button class="start" name="start" type="submit" value="on">{button-text}</button>
</form>

{turn}

{result}

{game-field}

</body>
</html>
