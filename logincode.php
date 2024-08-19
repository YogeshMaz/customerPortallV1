<?php

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$valid_users = [
    'ramasamy@saravanaenergy.com' => '7c6a180b36896a0a8c02787eeafb0e4c',
    'j.zarniko@heinzmann.de' => '6cb75f652a9b52798eb6cf2201057c73'
];

// Handle Login
if (isset($_POST['action']) && $_POST['action'] == 'login') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (isset($valid_users[$email])) {
            $hashed_password = $valid_users[$email];
            $hashed_user_password = md5($password);

            if ($hashed_password === $hashed_user_password) {
                $_SESSION['user'] = $email;
                header("Location: customer_dash.php");
                exit();
            } else {
                echo "Password incorrect. Authentication failed.";
            }
        } else {
            echo "User not found.";
        }
    } else {
        echo "Email and password must be provided.";
    }
}

// Handle Change Password
// if (isset($_POST['action']) && $_POST['action'] == 'change_password') {
//     if (isset($_POST['email']) && isset($_POST['current_password']) && isset($_POST['new_password'])) {
//         $email = $_POST['email'];
//         $current_password = $_POST['current_password'];
//         $new_password = $_POST['new_password'];

//         if (isset($valid_users[$email])) {
//             $hashed_password = $valid_users[$email];
//             $hashed_current_password = md5($current_password);

//             if ($hashed_password === $hashed_current_password) {
//                 $valid_users[$email] = md5($new_password);
//                 echo "Password changed successfully for $email.";
//             } else {
//                 echo "Current password incorrect.";
//             }
//         } else {
//             echo "User not found.";
//         }
//     } else {
//         echo "Email, current password, and new password must be provided.";
//     }
// }

// Handle Logout
if (isset($_POST['action']) && $_POST['action'] == 'logout') {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}

?>