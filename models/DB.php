<?php
class DB{
public $conn;
public function __construct()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "ikea";
    $this ->conn = new mysqli($servername, $username, $password, $db);

}



}
?>