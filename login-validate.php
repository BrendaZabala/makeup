<?php
session_start();
if(is_null($_SESSION['validated_user'])) {
    header('Location: index.php');
    die();
}
$makeup = $_SESSION['makeup_array'];
require 'inc/connection.php';

echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
$texto = "The user name or password that you\'ve entered doesn\'t match any account.";
$string = 
    'Swal.fire({
        icon: \'error\',
        text: \''. $texto . '\',
        showConfirmButton: true,
        confirmButtonText: \'Try Again\',
        reverseButtons: true,
        showDenyButton: true,
        denyButtonText: \'Create A New Account\',
        denyButtonColor: \'#17191b\',
        allowOutsideClick: false,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href="login.php"
        } else if (result.isDenied) {
            window.location.href="signin.php"
        }
    })';


$username = trim($_POST['user_name']);
$password = trim($_POST['password']);

if (
    !empty($username) && is_string($username) &&
    !empty($password) && is_string($password)
){
    $password = md5($password);

    $result = $connection->query('
    SELECT id
    FROM users
    WHERE
    user_name = "' . $connection->real_escape_string($username) . '" AND
    password = "' . $connection->real_escape_string($password) . '"'
    );

    if ($result->num_rows) {
        session_unset();
        session_start();
        $_SESSION['validated_user'] = true; 
        $_SESSION['user_name'] = $username;
        $_SESSION['makeup_array'] = $makeup;
        header('Location: index-logged.php');
        die();
    } else {
        echo '<body>';
        echo '<script language="javascript">' . $string . '</script>';
        echo '</body>';
    }
} 
else {
    echo '<body>';
    echo '<script language="javascript">' . $string . '</script>';
    echo '</body>';
}
