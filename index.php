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
    <script language="javascript" type="text/javascript">
        function getRealTime() {
            var dombidders = document.getElementById("biddercount");
            var domitems = document.getElementById("itemcount");
            var domitemtotal = document.getElementById("itemtotal");
            var dombidtotal = document.getElementById("bidtotal");
            var request = new XMLHttpRequest();
            request.open("GET", "realtime.php", true);
            request.onreadystatechange = function () {
                if(request.readyState == 4 && request.status == 200)
                {
                    var xmldoc = request.responseXML;

                    var xmlbidders = xmldoc.getElementsByTagName("bidders")[0];
                    var bidders = xmlbidders.childNodes[0].nodeValue;

                    var xmlitems = xmldoc.getElementsByTagName("items")[0];
                    var items = xmlitems.childNodes[0].nodeValue;

                    var xmlitemtotal = xmldoc.getElementsByTagName("itemtotal")[0];
                    var itemtotal = xmlitemtotal.childNodes[0].nodeValue;

                    var xmlbiddertotal = xmldoc.getElementsByTagName("bidtotal")[0];
                    var biddertotal = xmlbiddertotal.childNodes[0].nodeValue;

                    dombidders.innerHTML = bidders;
                    domitems.innerHTML = items;
                    dombidtotal.innerHTML = biddertotal;
                    domitemtotal.innerHTML = itemtotal;
                }
            };
            request.send();
        }

    </script>
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
            <script language="javascript" type="text/javascript">
                getRealTime();
                setInterval(getRealTime,5000);
            </script>
        </aside>
    </section>
    <footer>
        <?php
            include("footer.inc.php");
        ?>
    </footer>
</body>
</html>