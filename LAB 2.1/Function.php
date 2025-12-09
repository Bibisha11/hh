<?php

$numbers = [1,2,3,4,5];

function sumofarray($numbers){
$sum = 0;
for($i = 0; $i<count($numbers); $i++){
$sum = $sum + $numbers[$i];
}
return $sum;
}

$s = sumofarray($numbers);
echo $s;

?>