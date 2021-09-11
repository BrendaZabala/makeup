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
$m = $_GET['marca'];
$t = $_GET['tipo'];
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
            if (empty($m) && empty($t)) {
                $nro_al = random_int(0, count($makeup));
                echo '<h3>Random product</h3>';
                include 'templates/restricted-article-random.php';
            } else {
                $m_fil = trim(strtolower($m));
                $t_fil = str_replace(' ', '_', trim(strtolower($t)));
                
                echo '<h3>Results</h3>';
                echo '<div class=container-article>';
                $cont_resultados = 0;
                for ($i=0; $i < count($makeup); $i++) {
                    if (($makeup[$i]['brand'] === $m_fil && $makeup[$i]['product_type'] === $t_fil) || 
                    (empty($m) && $makeup[$i]['product_type'] === $t_fil) || 
                    (empty($t) && $makeup[$i]['brand'] === $m_fil) ) {
                        include 'templates/restricted-article-search.php';
                        $cont_resultados++; 
                    }
                }
                echo '</div>';
                if ($cont_resultados === 0) {
                    ?>
                    <div class="sin-resultados">
                        <h2>No results were found. Please try a different search.</h2>
                        <a href="search-logged.php" class="boton">back</a>
                    </div>
                    <?php
                }
            }
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