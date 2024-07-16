<?php
class Database
{
    public function connectDB()
	{
		try{

            $db = new mysqli("localhost","root","","networkdevices");
            
			return $db ;
		}catch(Exception $e){

			die($e->getMessage());
		}
	}
    public function result($query){
        $conn = $this -> connectDB();
        $result = $conn -> query($query) or die("connection faild");
        return $result;
    }
    protected function creatDB(){
        $conn = $this -> connectDB();
    
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
    
        $db = "CREATE DATABASE IF NOT EXISTS `networkdevices`";
        if ($conn->query($db) === TRUE) {
          echo "Database created successfully";
        } else {
          echo "Error creating database: " . $conn->error;
        }
      }
    
      protected function createTable() {
        $conn = $this -> connectDB();

        $user = "CREATE TABLE IF NOT EXISTS `user` (
          `userId` INT(11)  AUTO_INCREMENT PRIMARY KEY,
          `userName` VARCHAR(40) NOT NULL,
          `email` VARCHAR(30) NOT NULL,
          `password` VARCHAR(15) NOT NULL,
          `code` INT(10) NOT NULL,
          `status` TEXT,
          reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
          )";
          
        $device = "CREATE TABLE IF NOT EXISTS `devices` (
          `Id` INT(11)  AUTO_INCREMENT PRIMARY KEY,
          `Device` TEXT NOT NULL,
          `Brand` TEXT NOT NULL,
          `Model` VARCHAR(50) NOT NULL,
          `Img` VARCHAR(50) NOT NULL,
          `Price` INT(15) NOT NULL,
          reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
          )";
          
        if (($conn->query($user) === TRUE) && ($conn->query($device) === TRUE)) {
          echo "Table created successfully";
        } else {
          echo "Error creating table: " . $conn->error;
        }
      }
}