<?php

namespace model;

class App
{

    function add(array $arr)
    {

        $conn = $this->mysql_fix_string($arr);

        $data = array(
            'error' => "", 'success' => "", 'fetch' => "",
        );

        $imgpath = $this->image_upload($_FILES['image']);
        $query = "INSERT INTO `devices`( `Device`, `Brand`, `Model`, `Img`, `Price`) 
                  VALUES ('$arr[device]','$arr[brand]','$arr[model]','$imgpath','$arr[price]')";

        if ($conn->query($query)) {

            $data["success"] = 'Սարքավորում ավելացվել է ';
        } else {
            $data["error"] = 'Չհաջողվեց ավելացնել';
        }
        $data["fetch"] = $this->getAll();
        echo (json_encode($data));
    }
    function edit(array $arr)
    {  
        $conn = $this->mysql_fix_string($arr);
        $data = array(
            'error' => "", 'success' => "", 'fetch' => "",
        );
        
        if (file_exists($_FILES['editimage']['tmp_name']) || is_uploaded_file($_FILES['editimage']['tmp_name'])) {
            $query = "SELECT * FROM `devices` WHERE `Id`='$arr[editid]'";
            $result = $conn->query($query);
            $fetch = $result->fetch_assoc();

            $this->image_remove($fetch['Img']);
            $imgpath = $this->image_upload($_FILES['editimage']);
            $update = "UPDATE `devices` SET `Device`='$arr[editdevice]',`Brand`='$arr[editbrand]',`Model`='$arr[editmodel]',`Img`='$imgpath',
                     `Price`='$arr[editprice]' WHERE `Id`='$arr[editid]'";
        } else {
            $update = "UPDATE `devices` SET `Device`='$arr[editdevice]',`Brand`='$arr[editbrand]',`Model`='$arr[editmodel]',
                     `Price`='$arr[editprice]' WHERE `Id`='$arr[editid]'";
        }

        if ($conn->query($update)) {
            $data["success"] = 'Սարքավորման տվյալները փոխվեցին';
        } else {
            $data["error"] = 'Չհաջողվեց փոփոխել';
        }
        $data["fetch"] = $this->getAll();
        echo (json_encode($data));
    }
    function delete($id)
    {
        echo "bb";
        $DB =  new \Database();
        $conn = $DB->connectDB();
        $query = "SELECT * FROM `devices` WHERE `Id`='$id'";
        $result = $conn->query($query);
        $fetch = $result->fetch_assoc();
        $this->image_remove($fetch['Img']);
        echo "cc";
        $query = "DELETE FROM `devices` WHERE `Id`='$id'";
        if ($conn->query($query)) {
            $_SESSION['delete'] = 'Սարքավորումը ջնջված է ';
            $this->getAll();
        } else {
            $_SESSION['delete'] = 'Չհաջողվեց ջնջել ';
            $this->getAll();
        }
    }

    public function mysql_fix_string(array $metod)
    {
        $DB =  new \Database();
        $conn = $DB->connectDB();

        foreach ($metod as $key => $value) {
            $metod[$key] = htmlentities($conn->real_escape_string($value));
        }
        return $conn;
    }

    function image_upload($img)
    {
        $tmp_loc = $img['tmp_name'];

        $new_name = random_int(11111, 99999) . $img['name'];
        $new_loc = $_SERVER['DOCUMENT_ROOT'] . "/CRUD/public/uploads/" . $new_name;
        if (!move_uploaded_file($tmp_loc, $new_loc)) {
            $_SESSION['delete'] = 'Չհաջողվեց ավելացնել նկարը ';
            $this->getAll();
        } else {
            return $new_name;
        }
    }

    function image_remove($img)
    {
        if (!unlink($_SERVER['DOCUMENT_ROOT'] . "/CRUD/public/uploads/" . $img)) {
            $_SESSION['delete'] = 'Չհաջողվեց ջնջել նկարը';
            $this->getAll();
        }
    }
    function select($device,$brand){
        $DB =  new \Database();
        $conn = $DB->connectDB();
        
        $data = array(
            'error' => "", 'success' => "", 'fetch' => [],
        );
      
       
        if($device == "Բոլորը" && $brand == "Բոլորը"){ 
           $data["fetch"] = $this->getAll();
        }elseif($brand == "Բոլորը"){
            $data["fetch"] = $this->getSelected(array("Device" => $device));
        }elseif($device == "Բոլորը"){
            
            $data["fetch"] = $this->getSelected(array("Brand" => $brand));
        }else{
            $data["fetch"] = $this->getSelected(array($device,$brand));
        }
        
        echo (json_encode($data));
    }
    function getById($id)
    {
        $DB =  new \Database();
        $conn = $DB->connectDB();

        $query = "SELECT * FROM `devices` WHERE `Id`='$id'";
        $result = $conn->query($query);
        $fetch =  $result->fetch_assoc();

        return $fetch;
    }

    function getAll()
    {
        $DB =  new \Database();
        $conn = $DB->connectDB();
        $fetch = [];
        $query = "SELECT * FROM `devices`";
        $result = $conn->query($query);

        while ($row = $result->fetch_assoc()) {
            array_unshift($fetch, $row);
        }

        return $fetch;
    }
    function getSelected(array $arr)
    {
        $DB =  new \Database();
        $conn = $DB->connectDB();
        $fetch = [];
        if(count($arr) == 1){
            $key=array_keys($arr)[0];
            $query = "SELECT * FROM `devices` WHERE `{$key}`='$arr[$key]'";
        }else{
            $query = "SELECT * FROM `devices` WHERE `Device`='$arr[0]'  AND `Brand`= '$arr[1]'";
        }
        $result = $conn->query($query);

        while ($row = $result->fetch_assoc()) {
            array_unshift($fetch, $row);
        }

        return $fetch;
    }
    function onLoad()
    {
        $fetch = $this->getAll();
        $data = array(
            'error' => "", 'success' => "", 'fetch' => $fetch,
        );
        echo (json_encode($data));
    }
}
