<?php

$xml1 = simplexml_load_file('data1.xml') or die("Error: Cannot create object");
$xml2 = simplexml_load_file('data2.xml') or die("Error: Cannot create object");
$arr = array();
$arr2 = array();

function set(&$xml, &$arr)
{
    foreach ($xml as $key => $xmlpos) {
        //echo $key."\n";
        if ($xmlpos->count()) set($xmlpos, $arr);
        else {
            if (array_key_exists($key, $arr)) {
                array_push($arr, strval($xmlpos));
            } else $arr[strval($key)] = strval($xmlpos);
        }
    }

}

set($xml2, $arr);
set($xml1, $arr2);
$result = array_diff($arr, $arr2);
$myfile = fopen("compare.txt", "w");
file_put_contents('compare.txt', print_r($result, true));




