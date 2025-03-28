<?php 
session_start();
include('data/config.php');
$title="login";
include("func/get_title.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- google font -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Cardo:ital,wght@0,400;0,700;1,400&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <!-- css sheet -->

<link rel="stylesheet" href="css/style.css" >
<!-- bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- font -->

<link rel="stylesheet" href="css/all.css" >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo getTitle(); ?></title>
</head>
<body>
    <?php include("layout/head.php") ?>
    <form method="post" action="data/creat.php">

        <div class="continer">
            <div class="col-12">
                <label for="Title" class="form-label" >Title</label>
                <input type="text" class="form-control" id="Title" placeholder="Title" name="title">
            </div>
            
            <div class="col-12">
                <label for="description" class="form-label" style="margin-top: 15px;">Description</label>
                <textarea type="text" class="form-control" id="description" placeholder="description" style="height: 100px;" name="description"></textarea>
            </div>
            
            <div class="col-12">
                <label for="Post" class="form-label" style="margin-top: 15px;">Post Creator</label>
                <input type="text" class="form-control" id="Post" name="post">
            </div>
            
  <button type="submit" class="btn btn-success" style="width: 100px; margin-top:10px">Submit</button>
 </div>
 
</form>
</body>
</html>
