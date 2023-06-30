<?php
//error_reporting(0);
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "user";

$conn = mysqli_connect($host, $user, $password, $db);

if ($conn == false) {
    die("Connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["Password"];

    $sql = "SELECT * FROM auth WHERE username = '" . $username . "' AND password = '" . $password . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if ($row) {
        $_SESSION["username"] = $row["username"];
        $_SESSION["password"] = $row["password"];

        if ($row["username"] == "Admin") {
            header("location: admin.php");
        } else {
            header("location: data.php");
        }
    } else {
        $login_error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <center>
        <br>
        <h1>Login Form</h1>
        <br>
        <br><br><br><br><br><br>
        <div style="width: 500px;">
            <br>
            <form action="#" method="POST">
                <div>
                    <label>Username</label>
                    <input type="text" name="username" required>
                </div>
                <br>
                <div>
                    <label>Password</label>
                    <input type="password" name="Password" required>
                </div>
                <br>
                <div>
                    <input type="submit" value="Login" style="background-color: blue; width=230;" >
                </div>
            </form>
        </div>
    </center>
</body>
</html>
