<?php 



$rows = trim(fgets(STDIN));
$places = [];
for ($i = 0; $i < $rows; $i++) {
    $places[$i] = trim(fgets(STDIN));
}

$groups = trim(fgets(STDIN));

for ($i = 0; $i < $groups; $i++) {
    $requirements = explode(' ', trim(fgets(STDIN)));
    findMatchForGroup($requirements, $places);
}

function findMatchForGroup($requirements, $places) 
{
    for ($i = 0; $i < count($places); $i++) {
        findMatchForRow($places[$i], $i, $requirements);
    }
}

function findMatchForRow($row, $rowNum, $requirements) 
{
    $num = $requirements[0];
    $side = $requirements[1];
    $position = $requirements[2];

    if ($side == 'left') {

        if ($position == 'aisle') {

            for ($i = 2; $i > 2 - $num; $i--) {
                if ($row[$i] == '#') {
                    return false;
                }
            }

        } else {

            for ($i = 0; $i < $num; $i++) {
                if ($row[$i] == '#') {
                    return false;
                }
            }

        }

    } else {

        if ($position == 'aisle') {

            for ($i = 4; $i < $num + 4; $i++) {
                if ($row[$i] == '#') {
                    return false;
                }
            }

        } else {

            for ($i = 6; $i > 6 - $num; $i--) {
                if ($row[$i] == '#') {
                    return false;
                }
            }

        }

    }

    //return [1A, 1B, 1C];
    return [];
}