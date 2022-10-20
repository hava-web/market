<?php
$username = $_POST['name'];
$password = $_POST['password'];
$query ="SELECT name FROM admin WHERE name = ? AND password = ?";
$db = new mysqli("localhost", "root", "", "stock_market");
$stmt = $db->prepare($query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->bind_result($name);
$stmt->fetch();
if (isset($name)) {
 echo "<h2>Welcome to AuctionHelper</h2>\n";
 $_SESSION['login'] = $name;
 header("Location: index.php");
} else {
    ?>

    <h2>Sorry, login incorrect</h2>
    <a href="index.php">Please try again</a>
    
    <?php
}
?>