<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// 192.168.0.64_01_20180320100814869_TIMING.jpg
error_reporting(E_ERROR | E_PARSE);
$webcamFolder = $_SERVER['DOCUMENT_ROOT'].'/media/SNEB-Bienne';
if ($handle = opendir($webcamFolder)) {
    $today = new DateTime();
    $todayStr = $today->format("Ymd");
    $yesterday = new DateTime();
    $yesterday->sub(new DateInterval('P1D'));
    $YesterdayStr = date("Ymd")->format('Ymd');
    while (false !== ($entry = readdir($handle))) 
    {
        if(strrpos($entry, $YesterdayStr) || strrpos($entry, $todayStr))
        {
            
        }
        else
        {
             chdir($webcamFolder);
             chown($entry,465);
             $do = unlink($entry);
             echo($entry. " ". $do);
        }
    }
    closedir($handle);
}