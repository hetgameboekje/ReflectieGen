<?php
session_start();
require_once "mysqli.php";


function checkInput() {
    foreach($_POST as $key => $value) {
        $_POST[$key] = htmlentities(strip_tags($value)); //'= &quote;
    }
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login screen</title>
</head>

<body>
    <h2>Please login</h2>
    <div>
        <form action="index.php" method="post">
            <input type="text" class="field" name="Username" placeholder="username" required=""><br />
            <input type="password" class="field" name="Pass" placeholder="Password" required=""><br />
            <input type="submit" class="field" name="login" value="login"><br />
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['login'])) {
    checkInput();
    $Username = $_POST['Username']; //'SELECT * FROM users # || admin' OR 1=1 #
    $Pass = $_POST['Pass'];
    $select = mysqli_query($conn, "SELECT * FROM tb_gebruiker WHERE Username = '$Username' AND Pass = '$Pass'");
    $row = mysqli_fetch_array($select);
    if (is_array($row)) {
        $_SESSION["Username"] = $row['Username'];
        $_SESSION["Pass"] = $row['Pass'];
        $_SESSION["online"] = true;
        $_SESSION["admin"] = $row["adminPerm"];
        header("Location: ./new/index.php");
    } else {
        echo "oh";
        echo '<script type="text/javascript">';
        echo 'alert ("Invalid Username or Password!")';


        echo '</script>';
        echo 'window.location.href="index.php"';
    }
}
$text = "<p>Hello, <strong>world</strong>!</p>";

?>