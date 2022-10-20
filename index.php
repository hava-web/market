<?php
session_start();
include("Bidders.php");
include("Items.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        <?php include("header.inc.php"); ?>
    </header>
    <section id="container">
        <nav>
            <?php include("nav.inc.php"); ?>
        </nav>
        <main>
            <?php 
                if(isset($_REQUEST['content']))
                {
                    include($_REQUEST['content'].".inc.php");
                } 
                else
                {
                    include("main.inc.php");
                }
            ?>
        </main>
        <aside>
            <?php 
                include("aside.inc.php");
            ?>
        </aside>
    </section>
    <footer>
        <?php
            include("footer.inc.php");
        ?>
    </footer>
</body>
</html>