<?php
session_start();

$fold_name=$_SESSION['fold_name'];
$proj_name=$_SESSION['proj_name'];
$filename2_sta2=$_SESSION['filename2_sta2'];
header("Content-type: text/html; charset=utf-8");
$file="./cloudstasim/$fold_name/$proj_name/result/$filename2_sta2";
$filename="$filename2_sta2";
header("Content-type: ".filetype("$file"));
header("Content-Disposition: attachment; filename=".$filename."");
readfile($file);
?>
