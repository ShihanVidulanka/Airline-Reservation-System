<?php
function print_array($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function encryptPassword($password){
   return password_hash($password,PASSWORD_DEFAULT);  
}

function checkThePassword($password,$hashed_password){
    return password_verify($password,$hashed_password);
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
function create_dict($str){
    $str_without_brackets = rtrim($str,"}");
    $str_without_brackets = ltrim($str_without_brackets,"{");
    $array = explode(",",$str_without_brackets);

    $associative_array = array();
    foreach ($array as $item) {
        $temp = explode(":",$item);
        $associative_array[$temp[0]]=$temp[1];
    }
    return $associative_array;
}