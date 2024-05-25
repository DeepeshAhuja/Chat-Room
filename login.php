<?php
include('database.php');
session_start();

if(isset($_POST['username']) && isset($_POST['phonenumber'])) {

    $username = $_POST['username'];
    $phonenumber = $_POST['phonenumber'];

    $q = "SELECT * FROM user WHERE uname = '$username' && unumber = '$phonenumber'";
    if($rq = mysqli_query($conn,$q)){
        if(mysqli_num_rows($rq) == 1){
            $_SESSION["username"] = $username;
            $_SESSION["phonenumber"] = $phonenumber;
        }
        else{
            $q = "SELECT * FROM user WHERE unumber = '$phonenumber'";
            if($rq = mysqli_query($conn,$q)){
                if(mysqli_num_rows($rq) == 1){
                echo $phonenumber." is already taken";
                }
                else{
                    $q = "insert into user (unumber,uname) values ('$phonenumber','$username')";
                    if($rq = mysqli_query($conn,$q)){
                        $q = "SELECT * FROM user WHERE uname = '$username' && unumber = '$phonenumber'";
                        if($rq = mysqli_query($conn,$q)){
                            if(mysqli_num_rows($rq) == 1){
                                $_SESSION["username"] = $username;
                                $_SESSION["phonenumber"] = $phonenumber;
                                header("location: index.php");
                            }
                        }
                    }
                }
            }
        }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/login.css">
</head>
<body>
    <h1>Chat Room</h1>
    <div class="login">
        <h2>Login</h2>
        <p>This is login page for Chat Room</p>
        <form action="" method="post">
            <h3>Username</h3>
            <input type="text" name="username" placeholder="Username">

            <h3>Mobile No.</h3>
            <input type="text" name="phonenumber" min="1111111" max="999999999999999" placeholder="with country code">
<br>
            <button>Login/Register</button>
        </form>
    </div>
</body>
</html>
<?php
mysqli_close($conn);
?>