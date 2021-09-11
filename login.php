<?php
session_start();
if(is_null($_SESSION['validated_user'])) {
    header('Location: index.php');
    die();
}

$makeup = $_SESSION['makeup_array'];
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
    <title>Login</title>
</head>
<body>
    <header>
        <?php
        include 'templates/header.php';
        ?> 
    </header>
    <main>
        <div id="login-div">
            <h2>Login</h2>
            <form action="login-validate.php" method="post">
                <label>User Name
                    <input type="text" name="user_name" placeholder="user name" required>
                </label>
                <label>Password
                    <input type="password" name="password" placeholder="password" required>
                </label>
                <button type="submit">Log In</button>
            </form>
        </div>
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