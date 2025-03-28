<?php 
session_start();
 include('config.php');

 if($_SERVER['REQUEST_METHOD'] == "POST"){

    if (!isset($_POST['id']) || empty($_POST['id'])) {
        echo "error: missing id";
        exit;
    }

$post_id=$_POST['id'];

    try{
        $stmt=$con->prepare("DELETE FROM prod WHERE id = :id");
        $stmt->bindParam(':id' , $post_id ,PDO::PARAM_INT);
            if($stmt->execute()){
                header("location: ../home.php");
            }
        }
catch (PDOException $e){
echo "faild" . $e->getMessage();
}
 }