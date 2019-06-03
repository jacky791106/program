<?php
session_start();

$fold_name=$_SESSION['fold_name'];
$history_proj_name=$_SESSION['history_proj_name'];
//$filename2_sta2=$_SESSION['filename2_sta2'];

$dir = "./cloudstasim/$fold_name/$history_proj_name/result/";

if (is_dir($dir)) {
  if ($dh = opendir($dir)) {
    while (($file_sta1 = readdir($dh)) !== false) {
      if (strpos( $file_sta1, '.sta1') ){ //只過讀取出php 的檔案
        //echo "filename: $file_v : filetype: " . filetype($dir . $file) . "\n";
        $_SESSION['file_sta1'] = $file_sta1;
      }
    }
    closedir($dh);
  }
}

$file_sta1 = $_SESSION['file_sta1'];
header("Content-type: text/html; charset=utf-8");
$file="./cloudstasim/$fold_name/$history_proj_name/result/$file_sta1";
$filename="$file_sta1";
header("Content-type: ".filetype("$file"));
header("Content-Disposition: attachment; filename=".$filename."");
readfile($file);
?>
