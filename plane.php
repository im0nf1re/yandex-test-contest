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
        
    }
}

function findMatchForRow($row, $rowNum, $requirements) 
{
    $num = $requirements[0];
    $side = $requirements[1];
    $position = $requirements[2];

    if ($side == 'left') {
        $rowMatch = false;
        if ($requirements[2] == 'aisle') {
            for ($k = 2; $k > 2 - $requirements[0]; $k--) {
                if ($places[$j][$k] == '#') {
                    continue;
                }
            }
        }
    }    
}