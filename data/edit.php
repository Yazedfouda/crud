<?php 
session_start();
include("config.php");

if(isset($_SERVER['REQUEST_METHOD']) == "POST"){

    $title=$_POST['title'];
    $description=$_POST['description'];
    $post=$_POST['post'];
    $post_id=$_POST['id'];

    try{

        $stmt=$con->prepare("UPDATE prod SET title= :title ,des= :des, name_added = :name_added WHERE id= :id");

        $stmt->bindParam(':id' , $post_id ,PDO::PARAM_INT);
        $stmt->bindParam(':title' , $title ,PDO::PARAM_STR);
        $stmt->bindParam(':des' , $description ,PDO::PARAM_STR);
        $stmt->bindParam(':name_added' , $post ,PDO::PARAM_STR);
        if($stmt->execute()){
            header("location: ../home.php");
        }
        else{
            echo "faild";
        }
    }
    catch(PDOException $e){
        echo "yazed";
    }
}