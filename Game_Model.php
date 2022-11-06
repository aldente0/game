<?php

class Model_Game {

    private $state;
    private $result;
    
    public function __construct(array $state = [['', '', ''], ['', '', ''], ['', '', '']])
    {
        $this->state = $state;
        $this->result = 'no';
    }

    private function setWinner($newWinner) {
        $this->result = $newWinner;
    }

    public function getWinner()
    {
        return $this->result;
    }

    public function checkWinner(int $turn)
    {
        $resultOfCheckLines = $this->checkLines();

        if ($resultOfCheckLines) {
            $this->setWinner($resultOfCheckLines);
            return true;
        }

        if ($turn > 9 && !$resultOfCheckLines) {
            $this->setWinner('draw');
            return true;
        }

        return false;
    }

    private function checkLine(array $row)
    {
        // получим массив уникальных значений
        $uniqueRow = array_unique($row);

        // если массив содержит 1 элемент
        // то возможно кто-то победил
        if (count($uniqueRow) == 1) {
            if ($uniqueRow[0] == 'X') {
                return '1st player win!';
            }
            if ($uniqueRow[0] == 'O') {
                return '2nd player win!';
            }
        }

        return false;
    }

    private function checkLines(): string|bool
    {
        $lines = [];
        $lines[] = $this->state[0];
        $lines[] = $this->state[1];
        $lines[] = $this->state[2];
        $lines[] = $this->getColoumn(0);
        $lines[] = $this->getColoumn(1);
        $lines[] = $this->getColoumn(2);
        $lines[] = $this->getDiagonal(1);
        $lines[] = $this->getDiagonal(2);

        foreach ($lines as $line) {
            $checkedLine = $this->checkLine($line);
            if ($checkedLine) return $checkedLine;
        }

        return false;
    }

    private function getColoumn(int $coloumnNumber): array {
        $coloumn = [];

        for ($i = 0; $i < 3; $i++) {
            for ($j = $coloumnNumber; $j == $coloumnNumber; $j++) {
                $coloumn[] = $this->state[$i][$j];
            }
        }

        return $coloumn;
    }
    
    private function getDiagonal(int $whichDiagonal = 1): array {
        $diagonal = [];

        if ($whichDiagonal == 1) {
            for ($i = 0; $i < 3; $i++) {
                for ($j = $i; $j == $i; $j++) {
                    $diagonal[] = $this->state[$i][$j];
                }
            }
        } else {
            $row = 0;
            $col = 2;

            while (isset($this->state[$row][$col])) {
                $diagonal[] = $this->state[$row][$col];
                $row++;
                $col--;
            }

        }

        return $diagonal;
    }

    public function getState()
    {
        return $this->state;
    }

    public function set_o_or_x_in_state(array $position, int $counter)
    {
        $row = $position[0];
        $col = $position[1];

        if ($counter % 2 != 0) {
            $this->state[$row][$col] = 'O';
        } else {
            $this->state[$row][$col] = 'X';
        }
    }
}

?>