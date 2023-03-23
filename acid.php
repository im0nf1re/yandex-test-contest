<?php

$tankCount = trim(fgets(STDIN));
$tanks = explode(' ', trim(fgets(STDIN)));

for ($i = 0; $i < $tankCount - 1; $i++) {

    if ($tanks[$i] > $tanks[$i+1]) {
        fwrite(STDOUT, -1);
        return;
    }

}

$max = $tanks[$tankCount - 1];

$uniqueNumbers = [$tanks[0]];
$changeIndexes = [0];
for ($i = 0; $i < $tankCount; $i++) {
    if ($tanks[$i] > $uniqueNumbers[count($uniqueNumbers) - 1]) {
        $uniqueNumbers[] = $tanks[$i];
        $changeIndexes[] = $i;
    }
}

$actions = $max - $uniqueNumbers[0];
fwrite(STDOUT, $actions);




