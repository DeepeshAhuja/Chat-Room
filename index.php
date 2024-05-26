<?php
session_start();
if(isset($_SESSION["userName"]) && isset($_SESSION["phone"]))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatRoom</title>
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
    <h1>ChatRoom</h1>
    <div class="chat">
        <h2>Welcome <span><?php echo $_SESSION["userName"] ?></span> to the Chat Room </h2>
        <div class="msg">
        
        </div>
        <div class="input_msg">
            <input type="text"
            placeholder="Write Message Here">
            <button>Send</button>
        </div>
    </div>
</body>
</html>

<?php
}
else{
    header("Location: login.php");
}
?>