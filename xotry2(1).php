<?php


class TicTacGame
{

    private $fieldWidth = 3;
    private $fieldHeight = 3;
    private $countToWin = 3;
    private $field = array();
    private $winnerCells = array();
    private $currentPlayer = 1; 
    private $winner = null; 

    public function makeMove($x, $y)
    {
        if (
            $this->currentPlayer
            &&
            $x >= 0 && $x < $this->fieldWidth
            &&
            $y >= 0 && $y < $this->fieldHeight
            &&
            empty($this->field[$x][$y])
        ) {
            $current = $this->currentPlayer;

            $this->field[$x][$y] = $current;
            $this->currentPlayer = ($current == 1) ? 2 : 1;

            $this->checkWinner();
        }
    }

    private function checkWinner()
    {
        for ($y = 0; $y < $this->fieldHeight; $y++) {
            for ($x = 0; $x < $this->fieldWidth; $x++) {
                $this->checkLine($x, $y, 1, 0);
                $this->checkLine($x, $y, 1, 1);
                $this->checkLine($x, $y, 0, 1);
                $this->checkLine($x, $y, -1, 1);
            }
        }
        if ($this->winner) {
            $this->currentPlayer = null;
        }
    }

    private function checkLine($startX, $startY, $dx, $dy)
    {
        $x = $startX;
        $y = $startY;
        $field = $this->field;
        $value = isset($field[$x][$y]) ? $field[$x][$y] : null;
        $cells = array();
        $foundWinner = false;
        if ($value) {
            $cells[] = array($x, $y);
            $foundWinner = true;
            for ($i = 1; $i < $this->countToWin; $i++) {
                $x += $dx;
                $y += $dy;
                $value2 = isset($field[$x][$y]) ? $field[$x][$y] : null;
                if ($value2 == $value) {
                    $cells[] = array($x, $y);
                } else {
                    $foundWinner = false;
                    break;
                }
            }
        }
        if ($foundWinner) {
            foreach ($cells as $cell) {
                $this->winnerCells[$cell[0]][$cell[1]] = $value;
            }
            $this->winner = $value;
        }
    }

    public function getCurrentPlayer()
    {
        return $this->currentPlayer;
    }
    public function getWinner()
    {
        return $this->winner;
    }
    public function getField()
    {
        return $this->field;
    }
    public function getWinnerCells()
    {
        return $this->winnerCells;
    }
    public function getFieldWidth()
    {
        return $this->fieldWidth;
    }
    public function getFieldHeight()
    {
        return $this->fieldHeight;
    }
}
