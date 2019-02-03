<?php
/**
У вас нет доступа к библиотекам для работы с большими числами.
Дано два положительных целых числа в виде строки.
Числа могут быть очень большими, могут не поместиться в 64 битный integer.
Использование exec не допускается.
 */
$int = '121121212128696926492864826';
$int2 = '9750347509347590347509734970973405974';

function math_sum($int,$int2)
{
    $l1 = strlen($int);
    $l2 = strlen($int2);

    if($l1 === $l2){
    return math_calculate($int, $int2);
    } else {
    if($l1 > $l2 ){
        return math_calculate($int, str_repeat('0', $l1 - $l2 ).$int2);
        } else {

        return math_calculate($int2, str_repeat('0', $l2-$l1).$int);
        }
    }
}


function math_calculate($s1, $s2)
{

    // like in mathematics;
    $l = strlen($s1);
    $result = [];

    $plusOne = false;
    for($i = strlen($s1)-1; $i >= 0 ; $i--){
        $sum = (int) $s1[$i] + (int) $s2[$i];
        if($plusOne){
            $sum = $sum + 1;
        };
        if(isset($s1[$i-1]) && $sum >= 10 && $i !== 0){
            $sum = $sum - 10;
            $plusOne = true;
        } else {
            $plusOne = false;
        };

        $result[] = $sum;
    };

    $result = implode('', array_reverse($result));

    return $result;
};


function test($int, $int2){
    var_dump($int+$int2);
    var_dump(math_sum($int, $int2));
    return $int+$int2 == math_sum($int, $int2);
};

var_dump(test($int, $int2));

