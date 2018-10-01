<?php

if (isset($_POST['submit'])) {

    include_once 'dbh.php';

    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
        header("Location: ../signup.php?signup=empty");
        exit();
    }   else {
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
            header("Location: ../signup.php?signup=invalid");
            exit();
        
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signup.php?signup=email");
                exit();
            } else {
                //checks if username or email is taken
                $sql = "SELECT * FROM users WHERE user_uid='$uid";
                $result = mysqli_query($conn, $sql);
                $resultUser = mysqli_num_rows($result);
                $sql = "SELECT * FROM users WHERE user_email='$email'";
                $result = mysqli_query($conn, $sql);
                $resultEmail = mysqli_num_rows($result);
                if ($resultEmail > 0) {
                    header("Location: ../signup.php?emailTaken");
                    exit();
                }   else {
                    if($resultUser > 0) {
                        header("Location: ../signup.php?usertaken");
                        exit();
                    } else {
                        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                        //INSERT INFO INTO DATABASE

                        $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
                        mysqli_query($conn, $sql);
                        header("Location: ../login.php?signup=success");
                        exit();
                    }
                }
            }
        }
    }


} else {
    header("Location: ../signup.php");
    exit();
}