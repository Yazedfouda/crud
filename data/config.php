<?php 

$db="mysql:host=localhost;dbname=crud";

$user="root";

$pass="";

try{

    $con= new PDO($db, $user ,$pass);

    $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){

    echo "faild" . $e->getMessage();
}