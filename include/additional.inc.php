<?php
function print_array($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function remove_unnessaries($data,$password=0)
{
    if ($password==0){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    }else{
        $data = trim($data);
        $data = htmlspecialchars($data);
    }
    return $data;
}