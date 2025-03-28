<?php 
session_start();
include('data/config.php');
$title = "Show Post";
include("func/get_title.php");

// التأكد من وجود id في الرابط
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$post_id = $_GET['id'];

try {
    $stmt = $con->prepare("SELECT * FROM prod WHERE id = :id");
    $stmt->bindParam(':id', $post_id, PDO::PARAM_INT);
    $stmt->execute();
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
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
    <?php include("layout/head.php"); ?>

    <div class="container mt-4">
        <?php if ($post): ?>
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><?php echo htmlspecialchars($post['title']); ?></h5>
                    <div>
                        <?php if (isset($_SESSION['username']) && $_SESSION['username'] == $post['name_added']): ?>
                            <a href="edit.php?id=<?php echo $post['id']; ?>" class="btn btn-sm btn-light me-2">Edit</a>
                            <form method="post" action="data/delete.php" style="display: inline;" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- صورة افتراضية أو صورة البوست لو موجودة -->
                            <i class="fas fa-file-alt fa-5x text-muted"></i>
                        </div>
                        <div class="col-md-9">
                            <h6 class="text-muted">Description:</h6>
                            <p><?php echo htmlspecialchars($post['des']); ?></p>
                            <hr>
                            <h6 class="text-muted">Posted By:</h6>
                            <p><?php echo htmlspecialchars($post['name_added']); ?></p>
                            <h6 class="text-muted">Created At:</h6>
                            <p><?php echo htmlspecialchars($post['time']); ?></p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="index.php" class="btn btn-secondary">Back to Home</a>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                البوست غير موجود أو تم حذفه.
            </div>
            <a href="index.php" class="btn btn-secondary">Back to Home</a>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>