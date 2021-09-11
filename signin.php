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
    <title>Sign in</title>
</head>
<body>
	<header>
		<?php
		include 'templates/header.php';
		?>
	</header>
	<main>
		<div id="signin-div">
			<h2>Sign in</h2>
			<form action="signin-validate.php" method="post">
				<label>First name:
					<input type="text" name="first_name" placeholder="first name" required>
				</label>
				<label>Last name:
					<input type="text" name="last_name" placeholder="last name" required>
				</label>
				<label>Email:
					<input type="email" name="email" placeholder="example@example.com" required>
				</label>
				<label>Date of birth:
					<input type="date" name="date_of_birth" required>
				</label>
				<label>User name:
					<input type="text" name="user_name" placeholder="user name" required>
				</label>
				<label>New password:
					<input type="password" name="password" placeholder="5 character minimum" required>
				</label>
				<label for="acepto" id="terms">I accept terms and conditions
					<input type="checkbox" name="accepts_terms" value="yes" id="check" required>
				</label>
				<button type="submit">Create account</button>
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