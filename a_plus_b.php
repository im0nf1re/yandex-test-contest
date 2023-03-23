<?php 
$line = trim(fgets(STDIN));
$nums = explode(' ', $line);
$sum = $nums[0] + $nums[1];
fwrite(STDOUT, $sum);
