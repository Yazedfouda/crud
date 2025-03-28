<?php 
session_start();
include('data/config.php');
$title = "Edit";
include("func/get_title.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Cardo:ital,wght@0,400;0,700;1,400&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo getTitle(); ?></title>
</head>
<body>
    <?php include("layout/head.php") ?>
    <form method="post" action="data/edit.php" style="    margin-top: 20px;">
        <?php 
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $post_id = $_GET['id'];
            try {
                $stmt = $con->prepare("SELECT * FROM prod WHERE id = :id");
                $stmt->bindParam(':id', $post_id, PDO::PARAM_INT);
                $stmt->execute();
                $contents = $stmt->fetchAll();
            } catch (PDOException $e) {
                echo "faild: " . $e->getMessage();
            }

            if ($stmt->rowCount() > 0) {
                foreach ($contents as $cont) {
        ?>

            <div class="container">
                <div class="col-12">
                    <label for="Title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="Title"  name="title" value=<?php echo $cont['title']?>>
                </div>
                <div class="col-12">
                    <label for="description" class="form-label" style="margin-top: 15px;">Description</label>
                    <textarea type="text" class="form-control" id="description"  style="height: 100px;" name="description"> <?php echo $cont['des']?></textarea>
                </div>
                <div class="col-12">
                    <label for="Post" class="form-label" style="margin-top: 15px;">Post Creator</label>
                    <input type="text" class="form-control" id="Post" name="post" value=<?php echo $cont['name_added']?>>
                </div>
                <!-- إضافة حقل مخفي للـ id -->
                <input type="hidden" name="id" value="<?php echo $cont['id']; ?>">
                <button type="submit" class="btn btn-success" style="width: 100px; margin-top:10px">Submit</button>
            </div>
        <?php 
                }
            } else {
                echo "<p>لم يتم العثور على بيانات.</p>";
            }
        }
        ?>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>