<?php
    if(isset($_SESSION['login']))
    {
        $itemid = $_POST['itemid'];
        if((trim($itemid)=='') or (!is_numeric($itemid)))
        {
            echo "<h2>Sorry, you must enter a valid ID</h2>";
        }
        else
        {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $resaleprice = $_POST['resaleprice'];
            $winbidder = $_POST['winbidder'];
            $winprice = $_POST['winprice'];
            $item = new Items($itemid,$name,$description,$resaleprice,$winbidder,$winprice);
            $result = $item->saveItem();
            if($result)
            {
                echo "<h2>Item $itemid added succesfully</h2>";
            }
            else
            {
                echo "<h2>Sorry, we have some problem</h2>";
            }
        }
    }

?>