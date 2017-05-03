<?php

    //$_POST['username'];
    //$_POST['password'];

    if(!isset($_POST['username'])||!isset($_POST['password'])) {
        //below for debugging
        die("Error:".var_dump($_POST));
    }

    include_once "config.php";
    $conn = new mysqli(SERVER_NAME,USERNAME,PASSWORD,DATABASE);

    if($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT 'id','username','password' 
      FROM 'users' 
      WHERE 'username' = ?");
    //"s" is for string, can be concatenated
    $stmt->bind_param("ss",$_POST['username']);


    $conn->close();