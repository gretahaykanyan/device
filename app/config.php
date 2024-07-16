<?php
define('DB_NAME','networkdevices');
define('DB_USER','root');
define('DB_PASS','');
define('DB_HOST',"localhost");



define('PROTOCAL','http');


$path = str_replace("\\", "/",PROTOCAL ."://" . $_SERVER['SERVER_NAME'] . __DIR__  . "/");
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);
define('APP',$path);

define('ROOT', str_replace("app", "public", $path));

set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\ xampp\htdocs\CRUD');
define("UPLOAD_SRC",$_SERVER['DOCUMENT_ROOT']."/CURD/public/uploads/");
define("FETCH_SRC","http://localhost/CRUD/uploads/");
?>