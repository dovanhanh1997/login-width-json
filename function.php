<?php
function readDataJson($filePath){
    $getContents = file_get_contents($filePath);
    $data = json_decode($getContents,true);
    return $data;
}

function saveFileJson($filePath,$data){
    $content = readDataJson($filePath);
    array_push($content,$data);
    $newData = json_encode($content);
    file_put_contents($filePath,$newData);
}

function addAcount($name,$pass){
    $array = [
        'username'=>$name,
        'pass'=>$pass
    ];
    return $array;
}

function checkLogin($user,$pass,$filePath){
    foreach (readDataJson($filePath) as $value){
        if ($user == $value['username']){
            if ($pass == $value['pass']){
                return $value['username'];
            }
        }
    }
    return false;
}