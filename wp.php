<?php
session_start();

$proj_name = $_SESSION['proj_name'];
$filename = $_SESSION['filename'];
$fold_name = $_SESSION['fold_name'];
$filename_v = $_SESSION['filename_v'];
$wp_name = $proj_name."_wp".".bat";
$filename_ps = explode(".", $filename)[0] .".ps";
$open = fopen("wp/$wp_name","w+");
fwrite($open,"cd C:\AppServ\www\wp"."\r\n"."wp.exe  "."\r\n"."pause");
fclose($open);

$openstdw = fopen("wp/stdw","w+");
fwrite($openstdw,"compare ".$filename_v." ".$filename_v." ".$filename_v." "."to ".$filename_ps."\r\n".
"postscript"."\r\n".
"window 400 500"."\r\n".
"base 50 300"."\r\n".
"symbol line dash2 triangle"."\r\n".
"linear_interpolation"."\r\n".
"out_point"."\r\n".
"font_size 16"."\r\n".
"endw"."\r\n".
"endwmf"."\r\n");
fclose($openstdw);
shell_exec('C:\AppServ\www\wp/'.$wp_name);
copy("C:\AppServ\www\wp/".$filename_ps, "cloudstasim/$fold_name/$proj_name/result/".$filename_ps);

$filename_jpg = explode(".", $filename)[0] .".jpg";
$convert_name = $proj_name."_convert".".bat";
$openconvert = fopen("wp/$convert_name","w+");
fwrite($openconvert,"cd C:\AppServ\www\wp"."\r\n"."ImageMagick\convert.exe ".$filename_ps." ".$filename_jpg."\r\n"."pause");
fclose($openconvert);
shell_exec('C:\AppServ\www\wp/'.$convert_name);
copy("C:\AppServ\www\wp/".$filename_jpg, "C:\AppServ\www/".$filename_jpg);
copy("C:\AppServ\www\wp/".$filename_jpg, "cloudstasim/$fold_name/$proj_name/result/".$filename_jpg);

$_SESSION['filename_jpg']=$filename_jpg;

header("Content-type: text/html; charset=utf-8");
$file="./cloudstasim/$fold_name/$proj_name/result/$filename_ps";
$filename="$filename_ps";
header("Content-type: ".filetype("$file"));
header("Content-Disposition: attachment; filename=".$filename."");
readfile($file);



echo '<meta http-equiv=REFRESH CONTENT=5;url=drawps.php>';
?>
