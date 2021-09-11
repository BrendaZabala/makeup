<?php
session_start();
if(is_null($_SESSION['validated_user'])) {
    header('Location: index.php');
    die();
}

echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
$makeup = $_SESSION['makeup_array'];
require 'inc/connection.php';

$first_name    = trim($_POST['first_name']);
$last_name     = trim($_POST['last_name']);
$email         = trim($_POST['email']);
$date_of_birth = trim($_POST['date_of_birth']);
$user_name     = trim($_POST['user_name']);
$password      = trim($_POST['password']);

if (!empty($date_of_birth)) {
    $time_of_birth = strtotime($date_of_birth);
    $date = date('Y-m-d', $time_of_birth);
}

if (empty($date_of_birth) || $date !== $date_of_birth) {
    $date_of_birth = false;
}

if(!empty($email) && is_string($email)) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
}

if(!empty($email)) {
    $result = $connection->query('
    SELECT id FROM users
    WHERE email = "' . $connection->real_escape_string($email) . '"'
    );
    if ($result->num_rows) {
        $email = false;
    }
} else {
    $email = false;
}

if(!empty($user_name)) {
    $result = $connection->query('
    SELECT id
    FROM users
    WHERE
    user_name = "' . $connection->real_escape_string($user_name) . '"'
    );
    if ($result->num_rows) {
        $user_name = false;
    }
} else {
    $user_name = false;
}

if (strlen($password) < 5) {
    $password = false;
}

if (!empty($first_name) && is_string($first_name) &&
    !empty($last_name) && is_string($last_name) &&
    !empty($email) && 
    !empty($date_of_birth) &&
    !empty($user_name) && is_string($user_name) &&
    !empty($password) && is_string($password)
    ) {
        $password = md5($password);

        $connection->query(
            "INSERT INTO `users` (`first_name`, `last_name`, `email`, `date_of_birth`, `user_name`, `password`) 
            VALUES (
                '" . $connection->real_escape_string($first_name) . "', 
                '" . $connection->real_escape_string($last_name) . "', 
                '" . $connection->real_escape_string($email) . "', 
                '" . $connection->real_escape_string($date_of_birth) . "', 
                '" . $connection->real_escape_string($user_name) . "', 
                '" . $connection->real_escape_string($password) . "'
            );"
        );

        $string = 
        'Swal.fire({
            icon: \'success\',
            title: \'Created account!\',
            showConfirmButton: true,
            confirmButtonText: \'Login\',
            reverseButtons: true,
            showDenyButton: true,
            denyButtonText: \'Home\',
            denyButtonColor: \'#17191b\',
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href="login.php"
            } else if (result.isDenied) {
                window.location.href="index.php"
            }
           })';

           echo '<body>';
           echo '<script language="javascript">' . $string . '</script>';
           echo '</body>';
    } else {
        $text;
        $em   = 'An account with that email already exists.';
        $user = 'That username already exists.';
        $pass = 'The password does not have a minimum of five characters.';


        if(!$email && !$user_name && strlen($password) < 5) {
            $text = $em . '<br>' . $user . '<br>' . $pass; 
        }

        if(!$email && !$user_name && strlen($password) > 5) {
            $text = $em . '<br>' . $user; 
        }

        if(!is_bool($email) && !$user_name && strlen($password) < 5) {
            $text = $user . '<br>' . $pass; 
        }

        if(!$email && !is_bool($user_name) && strlen($password) < 5) {
            $text = $em . '<br>' . $pass; 
        }

        if(!$email && !is_bool($user_name) && strlen($password) > 5) {
            $text = $em; 
        }        

        if(!is_bool($email) && !$user_name && strlen($password) > 5) {
            $text = $user; 
        }

        if(!is_bool($email) && !is_bool($user_name) && strlen($password) < 5) {
            $text = $pass; 
        }

        $string = 'Swal.fire({ 
            icon: \'error\',
            title: \'Oops...\',
            allowOutsideClick: false,
            confirmButtonText: \'Try Again\',
            html: \'' . $text . '\',
            }).then(function(){
                history.back();
                window.location.href="signin.php"});';

        echo '<body>';        
        echo '<script language="javascript">' . $string . '</script>';
        echo '</body>';
    }
?>