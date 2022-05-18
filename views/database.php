<?php
   // $host= 'localhost';
   // $db1 = 'onlineexam';
   // $user = 'postgres';
   // $password = 'pritesh123';
   // $port ='5432';
   // try {
   //    $db = new PDO("pgsql:host=$host;port=$port;dbname=$db1", $user,$password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
   
   //    if ($db) {
   //       echo "Connected to the  database successfully!";
   //    }
   // } catch (PDOException $e) {
   //    die($e->getMessage());
   // } finally {
   //    if ($db) {
   //       $db = null;
   //    }
   // }

    $dbHost="localhost";  
    $dbName="onlineexam";  
    $dbUser="postgres";      //by default root is user name.  
    $dbPassword="pritesh123";     //password is blank by default 
    $port="5432";

    try{  
        $db= new PDO("pgsql:host=$dbHost;port=$port;dbname=$dbName",$dbUser,$dbPassword);  
        Echo "Successfully connected with myDB database"; 
    } catch(Exception $e){  
    Echo "Connection failed" . $e->getMessage();  
    }  
   ?>
   