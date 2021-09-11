<?php
session_start();
if(is_null($_SESSION['validated_user'])) {
    $string = file_get_contents('http://makeup-api.herokuapp.com/api/v1/products.json');
    $makeup = json_decode($string, true);
    $_SESSION['makeup_array'] = $makeup;
}
$makeup = $_SESSION['makeup_array'];
$_SESSION['validated_user'] = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/014362875e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
        <section class="index-seccion-1">
            <h1>Welcome</h1>
            <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, iusto!</h3>
            <div class="container-botones ">
                <a href="search.php" class="boton lupa">Search</a>
                <a href="random.php" class="boton">Random</a>
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