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
            <form action="filter-logged.php" method="GET" id="formulario">
                <label for="marca">
                    <input type="text" name="marca" id="marca" placeholder="write a brand name...">
                </label>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="56" height="56" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                <label for="tipo">
                    <input type="text" name="tipo" id="tipo" placeholder="write a product type...">
                </label>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-equal" width="56" height="56" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 9h14m-14 6h14" />
                </svg>
                <input type="submit" value="Search" class="boton boton-form">
            </form>
            <div>
                <h3>Brands list:</h3>
                <p class="p-marcas"> almay ━ alva ━ anna sui ━ annabelle ━ benefit ━ boosh ━ burt's bees ━ butter london ━ c'est moi ━ cargo cosmetics ━ china glaze ━ clinique ━ coastal classic creation ━ colourpop ━ covergirl ━ dalish ━ deciem ━ dior ━ dr. hauschka ━ e.l.f. ━ essie ━ fenty ━ glossier ━ green people ━ iman ━ l'oreal ━ lotus cosmetics usa ━ maia's mineral galaxy ━ marcelle ━ marienatie ━ maybelline ━ milani ━ mineral fusion ━ misa ━ mistura ━ moov ━ nudus ━ nyx ━ orly ━ pacifica ━ penny lane organics ━ physicians formula ━ piggy paint ━ pure anada ━ rejuva minerals ━ revlon ━ sally b's skin yummies ━ salon perfect ━ sante ━ sinful colours ━ smashbox ━ stila ━ suncoat ━ w3llpeople ━ wet n wild ━ zorah ━ zorah biocosmetiques</p>
            </div>
            <div>
                <h3>Product Types:</h3>
                <p class="p-marcas"> blush ━ bronzer ━ eyebrow ━ eyeliner ━ eyeshadow ━ foundation ━ lip liner ━ lipstick ━ mascara ━ nail polish</p>
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