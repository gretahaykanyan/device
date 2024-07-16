<?php

namespace controller;

class App
{

    public  function show()
    {

        include_once "../app/view/app.php";
    }
    function index()
    {
        $app = new \model\App;

        if (isset($_POST['device']) && isset($_POST['brand']) && isset($_POST['model']) && isset($_POST['price'])) {

            $app->add($_POST);
        } else if (isset($_POST['editdevice']) || isset($_POST['editbrand']) || isset($_POST['editmodel']) || isset($_POST['editprice'])) {

            $app->edit($_POST);
        } else if (isset($_POST["selectdevice"])) {

            $app->select($_POST["selectdevice"], $_POST["selectbrand"]);
        } else {

            $app->onLoad();
        }
    }
}
