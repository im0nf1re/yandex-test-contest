<?php

// $nAndk = explode(' ',  trim(fgets(STDIN)));
// $a = explode(' ', trim(fgets(STDIN)));

// $n = $nAndk[0];
// $k = $nAndk[1];

// Читаем данные из стандартного ввода
$handle = fopen("php://stdin", "r");
list($n, $k) = fscanf($handle, "%d %d\n");
$a = fscanf($handle, str_repeat("%d ", $n));

// Функция расстояния
function distance($a, $i, $j) {
    return abs($a[$i] - $a[$j]);
}

// Вычисляем f(i) для каждого i
for ($i = 0; $i < $n; $i++) {
    // Список расстояний от i до остальных элементов
    $d = array_map(function($j) use ($a, $i) { 
        return distance($a, $i, $j); 
    }, range(0, $n-1));
    // Удаляем i из списка
    unset($d[$i]);
    // Сортируем список расстояний
    asort($d);
    // Берём первые k элементов
    $s = array_slice($d, 0, $k);
    // Вычисляем f(i)
    $f = 0;
    foreach ($s as $j => $dist) {
        $f += $dist;
    }
    // Выводим результат
    echo $f . " ";
}
echo "\n";



// $aSorted = $a;
// sort($aSorted);

// for ($i = 0; $i < count($a); $i++) {
//     // find el in $aSorted with binary search
//     $elIndex = binarySearch($aSorted, $a[$i]);
    
//     // find k closest number by 2 sides
//     for ($j = $elIndex; $j < $elIndex) 
// }

// function binarySearch($aSorted, $el) {
//     $start = 0;
//     $end = count($aSorted) - 1;
//     while ($start <= $end) {
//         $center = round(($end - $start) / 2);

//         if ($aSorted[$center] == $el) {
//             return $center;
//         }
//         if ($aSorted[$center] > $el) {
//             $end = $center - 1;
//         }
//         if ($aSorted[$center] < $el) {
//             $start = $center + 1;
//         }
//     }

//     return -1;
// }


// $diffs = [];
// for ($i = 0; $i < count($a); $i++) {
//     for ($j = $i + 1; $j < count($a); $j++) {
//         if ($i == $j) {
//             continue;
//         }
//         $diffs['.'.$i.'_'.$j.'.'] = abs($a[$i] - $a[$j]);
//     }
// }

// for ($i = 0; $i < count($a); $i++) {
//     $diffsForIndex = getDiffsForIndex($i);
//     sort($diffsForIndex);

//     $sum = 0;
//     for ($j = 0; $j < $k; $j++) {
//         $sum += $diffsForIndex[$j];
//     }

//     fwrite(STDOUT, $sum." ");
// }

// function getDiffsForIndex($index) {
//     global $diffs;
    
//     $diffsForIndex = [];
//     foreach ($diffs as $key => $diff) {
//         $pos1 = strpos($key, '.'.$index.'_');
//         $pos2 = strpos($key, '_'.$index.'.');
//         if ($pos1 !== false || $pos2 !== false) {
//             $diffsForIndex[] = $diff;
//         }
//     }

//     return $diffsForIndex;
// }
