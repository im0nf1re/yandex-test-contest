<?php

$j = trim(fgets(STDIN));
$s = trim(fgets(STDIN));

$num = 0;
for ($i = 0; $i < strlen($s); $i++) {
    if (strpos($j, $s[$i]) !== false) {
        $num++;
    }
}

fwrite(STDOUT, $num);