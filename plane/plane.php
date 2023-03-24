<?php 

$lines = file('input.txt');

$rows = trim($lines[0]);
$places = [];
for ($i = 1; $i <= $rows; $i++) {
    $places[] = trim($lines[$i]);
}

$groups = trim($lines[$rows + 1]);
$requirements = [];
for ($i = $rows + 2; $i < $rows + 2 + $groups; $i++) {
    $requirements[] = explode(' ', trim($lines[$i]));
}

file_put_contents('output.txt', '');

for ($i = 0; $i < $groups; $i++) {
    findMatchForGroup($requirements[$i], $places);
}

function findMatchForGroup($requirements, &$places) 
{
    $matching = [
        0 => 'A',
        1 => 'B',
        2 => 'C',
        4 => 'D',
        5 => 'E',
        6 => 'F',
    ];

    for ($i = 0; $i < count($places); $i++) {
        $answer = findMatchForRow($places[$i], $i, $requirements);

        if ($answer === false) {
            continue;
        }

        foreach ($answer as $seat) {
            $places[$i][$seat] = 'X';
        }

        file_put_contents('output.txt', 'Passengers can take seats:', FILE_APPEND);
        for ($j = 0; $j < count($answer); $j++) {
            file_put_contents('output.txt', " ", FILE_APPEND);
            file_put_contents('output.txt', $i + 1 . $matching[$answer[$j]], FILE_APPEND);
        }

        file_put_contents('output.txt', "\n", FILE_APPEND);
        for ($j = 0; $j < count($places); $j++) {
            file_put_contents('output.txt', $places[$j] . "\n", FILE_APPEND);
        }

        foreach ($answer as $seat) {
            $places[$i][$seat] = '#';
        }
        
        return;
    }

    file_put_contents('output.txt', "Cannot fulfill passengers requirements\n", FILE_APPEND);
}

function findMatchForRow($row, $rowNum, $requirements) 
{
    $num = $requirements[0];
    $side = $requirements[1];
    $position = $requirements[2];

    $answer = [];
    if ($side == 'left') {

        if ($position == 'aisle') {

            for ($i = 2; $i > 2 - $num; $i--) {
                if ($row[$i] != '.') {
                    return false;
                }
                $answer[] = $i;
            }

        } else {

            for ($i = 0; $i < $num; $i++) {
                if ($row[$i] != '.') {
                    return false;
                }
                $answer[] = $i;
            }

        }

    } else {

        if ($position == 'aisle') {

            for ($i = 4; $i < $num + 4; $i++) {
                if ($row[$i] != '.') {
                    return false;
                }
                $answer[] = $i;
            }

        } else {

            for ($i = 6; $i > 6 - $num; $i--) {
                if ($row[$i] != '.') {
                    return false;
                }
                $answer[] = $i;
            }

        }

    }
    sort($answer);
    return $answer;
}