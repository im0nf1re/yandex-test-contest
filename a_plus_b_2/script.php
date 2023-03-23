<?php

$input = file_get_contents('input.txt');
$nums = explode(' ', $input);
file_put_contents('output.txt', $nums[0] + $nums[1]);