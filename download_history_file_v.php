<?php
session_start();

$fold_name=$_SESSION['fold_name'];
$history_proj_name=$_SESSION['history_proj_name'];
//$filename2_sta2=$_SESSION['filename2_sta2'];

$dir = "./cloudstasim/$fold_name/$history_proj_name/result/";

if (is_dir($dir)) {
  if ($dh = opendir($dir)) {
    while (($file_v = readdir($dh)) !== false) {
      if (strpos( $file_v, '.v') ){ //只過讀取出php 的檔案
        //echo "filename: $file_v : filetype: " . filetype($dir . $file) . "\n";
        $_SESSION['file_v'] = $file_v;
        //$file_v=$_SESSION['file_v'];
      }
    }
    closedir($dh);
  }
}

$file_v = $_SESSION['file_v'];
header("Content-type: text/html; charset=utf-8");
$file="./cloudstasim/$fold_name/$history_proj_name/result/$file_v";
$filename="$file_v";
header("Content-type: ".filetype("$file"));
header("Content-Disposition: attachment; filename=".$filename."");
readfile($file);
?>
