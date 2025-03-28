<?php 
session_start();
include('func/get_title.php');
include('data/config.php');
$title = 'HOME';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Cardo:ital,wght@0,400;0,700;1,400&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/my.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo getTitle(); ?></title>
</head>
<body>
    <?php include('layout/head.php'); ?>
    <?php 
        // عرض رسالة تسجيل الدخول إذا كانت موجودة
        if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php 
                echo $_SESSION['message'];
                unset($_SESSION['login_message']); // حذف الرسالة بعد العرض
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <script >
    setTimeout(function() {
        let alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.add('fade');
            alert.classList.remove('show' );
            alert.remove();
            
        }
    }, 3000); // الرسالة تختفي بعد 3 ثوانٍ
</script>
            </div>
        <?php endif; ?>
    <a href="creat.php" class="btn btn-success" style="margin-top: 20px; margin-bottom:10px;">Creat Post</a>
    <table class="table table-hover" style="width: 85%;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col" style="width:17%">Posted By</th>
                <th scope="col" style="width: 30%;">Created At</th>
                <th scope="col" style="width: 30%;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            try {
                $stmt = $con->prepare("SELECT * FROM prod");
                $stmt->execute();
                $contents = $stmt->fetchAll();
                $num = 1;

                if ($stmt->rowCount() > 0) {
                    foreach ($contents as $cont) {
                        echo "
                        <tr>
                            <th scope='row'>{$num}</th>
                            <td>{$cont['title']}</td>
                            <td>{$cont['name_added']}</td>
                            <td>{$cont['time']}</td>
                            <td>
                                <a href='show.php?id={$cont['id']}' class='btn btn-info'>Show</a>
                                <a href='edit.php?id={$cont['id']}' class='btn btn-primary' style='width: 100px;'>Edit</a>
                                <form method='post' action='data/delete.php' style='display: inline;' onsubmit='return confirm(\"هل أنت متأكد من الحذف؟\");'>
                                    <input type='hidden' name='id' value='{$cont['id']}'>
                                    <button type='submit' class='btn btn-danger'>Delete</button>
                                </form>
                            </td>
                        </tr>";
                        $num++;
                    }
                } else {
                    echo "<tr><td colspan='5'>لا توجد بيانات لعرضها</td></tr>";
                }
            } catch (PDOException $e) {
                echo "فشل الاستعلام: " . $e->getMessage();
            }
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php include("layout/footer.php")?>
</body>
</html>