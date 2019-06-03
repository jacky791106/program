<?php
session_start();

$fold_name=$_SESSION['fold_name'];
$proj_name=$_SESSION['proj_name'];
$filename_v=$_SESSION['filename_v'];
header("Content-type: text/html; charset=utf-8");
$file="./cloudstasim/$fold_name/$proj_name/result/$filename_v";
$filename="$filename_v";
header("Content-type: ".filetype("$file"));
header("Content-Disposition: attachment; filename=".$filename."");
readfile($file);
?>
