<?php
function randStrGen($len){
	$result = "";
    $chars = "9pukSmEB123456789maoNaBcDefgHijkLmNopMDsGuvxyzjUkoQRq3";
    $charArray = str_split($chars);
    for($i = 0; $i < $len; $i++){
	    $randItem = array_rand($charArray);
	    $result .= "".$charArray[$randItem];
    }
    return $result;
}
?>