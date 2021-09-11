<?php
session_start();
if (is_null($_SESSION['validated_user'])) {
    header('Location: index.php');
    die();
} else if (!$_SESSION['validated_user']) {
    header('Location: unauthorized.php');
    die();
}

$makeup = $_SESSION['makeup_array'];
$username = $_SESSION['user_name']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/014362875e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/main.js"></script>
    <title>Makeup Search</title>
</head>
<body>
	<header>
        <?php 
        include 'templates/header-restricted.php';
        ?>
    </header>
    <main>
        <section class="secciones" id="seccion-1">
            <?php
            $nro_al = random_int(0, count($makeup));
            echo '<h3>Random product</h3>';
			include 'templates/restricted-article-random.php';
        	?>
        </section>
        <div class="go-top-container">
            <div class="go-top-button">
                <i class="fas fa-chevron-up"></i>
            </div>
        </div>
    </main>
    <footer class="secciones" id="seccion-4">
		<?php
            include 'templates/footer.php';       
        ?>
    </footer>
</body>
</html>