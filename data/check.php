<?php 
session_start();
include("config.php");

if(isset($_SERVER['REQUEST_METHOD'])== 'POST'){


    $email= trim($_POST['email']);
    $password=trim( $_POST['password']);

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        die( "البريد غير صالح");
    }

    try{

        $stmt= $con->prepare("SELECT id, username , password FROM register WHERE email= :email");
        $stmt->bindParam(':email' ,$email ,PDO::PARAM_STR);
        $stmt->execute();
        $user=$stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password , $user['password'])){
            $_SESSION['id']=$user['id'];
            $_SESSION['username']=$user['username'];
            $_SESSION['message']="login is succses";
            header("location: ../home.php");
            exit();
        }
        else{
        $_SESSION['error'] = "اسم المستخدم أو كلمة المرور غير صحيحة.";
        header("location: ../layout/login.php");
            
        }
    }
    catch(PDOException $e){
        echo "faild" . $e->getMessage();
    }

}