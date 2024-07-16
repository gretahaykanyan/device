<?php
session_start();
require __DIR__ . "/../autoload.php";
$urlApp = new Url();
$url = $urlApp->splitURL();
if (isset($_SESSION['uname'])) {
    $app = new controller\App;
    $app->index();
} else {
    new controller\Users;
}
