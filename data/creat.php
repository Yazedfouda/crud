<?php 
session_start();
include('config.php');

if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){
    $title=$_POST['title'];
    $description=$_POST['description'];
    $post=$_POST['post'];

    try{

        $stmt=$con->prepare("INSERT INTO prod( title, des, name_added) VALUES (:title , :des , :creator)");

    $stmt->bindParam(':title' , $title,PDO::PARAM_STR);
    $stmt->bindParam(':des' , $description,PDO::PARAM_STR);
    $stmt->bindParam(':creator' , $post,PDO::PARAM_STR);

    if($stmt->execute()){
        header("location: ../home.php");
    }
    else{
        echo"faild";
    }
    }
    catch(PDOException $e){
        echo "faild" . $e;
    }
}