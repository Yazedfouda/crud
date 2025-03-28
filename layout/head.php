<?php 
// session_start();
// include('../func/get_title.php');
// $title="NAV"
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
    <title>head</title>
</head>
<body>
  <?php 
  if(!isset($_SESSION['username'])){

  ?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Oxygen</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        </li>

      </ul>
        <a href="layout/login.php" class="btn btn-outline-primary" type="submit" style="width: 100px;">login</a>
        <a href="layout/register.php" class="btn btn-outline-success" type="submit" style="width: 100px; margin-left: 5px">Sign up</a>
      </form>
    </div>
  </div>
</nav>
<?php }
else {

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">Oxygen</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
          </ul>
        </li>
      </ul>
        <h3 style="font-size: 20px;"><?php echo $_SESSION['username'];?></h3>
        <a href="data/logout.php" class="btn btn-outline-success"  style="width: 100px; margin-left: 5px">logout</a>
      </form>
    </div>
  </div>
</nav>
<?php }?>
    
</body>
</html>