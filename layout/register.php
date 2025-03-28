<?php
session_start();
$title="Register";
include("../func/get_title.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- font -->

<link rel="stylesheet" href="../css/all.css" >
    <!-- css sheet -->

    <link rel="stylesheet" href="../css/style.css" >
    <!-- bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo getTitle(); ?></title>
</head>
<body>
    <div class="continer">

        <form method="post" action="../data/insert.php">
            <div class="text-center mb-3">
                <p>Sign up with:</p>
                <a href="https://www.facebook.com" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
    </a>
                
        <a href="https://www.google.com" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-google"></i>
</a>
                
        <a href="https://www.twitter.com" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
</a>
                
                <a href="https://www.github.com" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-github"></i>
</a>
            </div>
            
      <p class="text-center">or:</p>
      
      <!-- Name input -->
      <div data-mdb-input-init class="form-outline mb-4">
          <label class="form-label" for="Name">Name</label>
          <input type="text" id="Name" name="name" class="form-control" />
        </div>
        
        <!-- Username input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="Username">Username</label>
            <input type="text" id="Username" name="username" class="form-control" />
        </div>
        
        <!-- Email input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="Email">Email</label>
            <input type="email" id="Email" name="email" class="form-control" />
        </div>
        
        <!-- Password input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="Password">Password</label>
            <input type="password" id="Password" name="password" class="form-control" />
        </div>
        
        <!-- Checkbox -->
        <div class="form-check d-flex justify-content-center mb-4">
            <input
            class="form-check-input me-2"
            type="checkbox"
            value=""
            id="registerCheck"
            checked
            aria-describedby="registerCheckHelpText"
            />
            <label class="form-check-label" for="registerCheck">
                I have read and agree to the terms
            </label>
        </div>
        
        <!-- Submit button -->
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-3">Sign in</button>
    </form>
</div>
</div>
</div>
<!-- Pills content -->
</body>
</html>