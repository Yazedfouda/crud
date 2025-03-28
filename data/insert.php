<?php 
session_start();
include("config.php");

if(isset($_SERVER['REQUEST_METHOD']) == "POST"){

    $name= htmlspecialchars($_POST['name']);
    $username= htmlspecialchars($_POST['username']);
    $email= htmlspecialchars($_POST['email']);
    $password=password_hash( $_POST['password'] , PASSWORD_DEFAULT);

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        die( "البريد غير صالح");
    }

    try{

        $stmt=$con->prepare("INSERT INTO register ( name, username, email, password) VALUES (:name , :username , :email , :password)");

        $stmt->bindParam(':name' ,$name , PDO::PARAM_STR);
        $stmt->bindParam(':username' , $username ,PDO::PARAM_STR);
        $stmt->bindParam(':email' , $email ,PDO::PARAM_STR);
        $stmt->bindParam(':password' , $password , PDO::PARAM_STR);

    if ($stmt->execute()){;
        header("location: ../layout/login.php");
    }
    else{
        $error = "اسم المستخدم أو كلمة المرور غير صحيحة.";
    }
        
    }
    catch(PDOException $r){
        echo "faild" . $r->getMessage(); 
    }
    
}