<?php
session_start();
if(is_null($_SESSION['validated_user'])) {
    header('Location: index.php');
    die();
}
$_SESSION['validated_user'] = false;

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
    include 'templates/header.php';
    ?>    
    </header>
    <main>
        <section class="secciones fondo-mkp" id="seccion-1">
            <div class="error-login">
                <p>Sorry, you are not allowed to access this page. Try to <a href="login.php">sign in</a> or <a href="signin.php">sign up</a>.</p>
            </div>
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