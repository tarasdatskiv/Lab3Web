<?php
require_once(dirname(__FILE__) . '/xotry2(1).php');

session_start();

$game = isset($_SESSION['game']) ? $_SESSION['game'] : null;
if (!$game || !is_object($game)) {
    $game = new TicTacGame();
}

$params = $_GET + $_POST;
if (isset($params['action'])) {
    $action = $params['action'];

    if ($action == 'move') {
        $game->makeMove((int)$params['x'], (int)$params['y']);
    } else if ($action == 'newGame') {
        $game = new TicTacGame();
    }
}
$_SESSION['game'] = $game;

$width = $game->getFieldWidth();
$height = $game->getFieldHeight();
$field = $game->getField();
$winnerCells = $game->getWinnerCells();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" version="XHTML+RDFa 1.0" dir="ltr">

<head profile="http://www.w3.org/1999/xhtml/vocab">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <center>
        <style type="text/css">
            .ticTacField--center {
                display: flex;
                justify-content: center;
            }

            .ticTacField {
                overflow: hidden;
                align-items: center;
                justify-content: center;
            }

            .ticTacRow {
                clear: both;
            }

            .ticTacCell {
                float: left;
                border: 1px solid #ccc;
                width: 200px;
                height: 200px;
                position: relative;
                text-align: center;
                font-size: 200px;
              
            }

            .ticTacCell a {
                position: absolute;
                left: 0;
                top: 0;
                right: 0;
                bottom: 0
            }

            .ticTacCell a:hover {
                background: #aaa;
            }

            .ticTacCell.winner {
                background: #f00;
            }

            .icon {
                display: inline-block;
            }

            .player1:after {
                content: 'X';
            }

            .player2:after {
                content: 'O';
            }
        </style>

        <?php if ($game->getCurrentPlayer()) { ?>
            Хід робить гравець:
            <div class="icon player<?php echo $game->getCurrentPlayer() ?>"></div>...
        <?php } ?>

        <?php if ($game->getWinner()) { ?>
            Виграв гравець:
            <div class="icon player<?php echo $game->getWinner() ?>"></div>!
        <?php } ?>

        <div class="ticTacField--center">
            <div class="ticTacField">
                <?php for ($y = 0; $y < $height; $y++) { ?>
                    <div class="ticTacRow">
                        <?php for ($x = 0; $x < $width; $x++) {
                            $player = isset($field[$x][$y]) ? $field[$x][$y] : null;
                            $winner = isset($winnerCells[$x][$y]);
                            $class = ($player ? ' player' . $player : '') . ($winner ? ' winner' : '');
                        ?>
                            <div class="ticTacCell<?php echo $class ?>">
                                <?php if (!$player) { ?>
                                    <a href="?action=move&amp;x=<?php echo $x ?>&amp;y=<?php echo $y ?>"></a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <br /><a href="?action=newGame">Початок нової гри</a>
        <br> <a href='index.html'>Назад</a>
    </center>
</body>

</html>