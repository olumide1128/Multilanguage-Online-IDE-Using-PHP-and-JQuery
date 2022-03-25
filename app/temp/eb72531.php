
<?php

function getSum($x, $y){
    
    $z = $x + $y;
    
    return "The sum of ".$x." and ".$y." is: ".$z;

}

#Call the function
echo getSum(2, 5);

?>