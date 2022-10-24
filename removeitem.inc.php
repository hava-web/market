<?php
    if(isset($_SESSION['login']))
    {
        $itemid = $_POST['itemid'];
        $item = Items::findItem($itemid);
        $result = $item->removeItem();
        if($result)
        {
            echo "<h2>Item $itemid removed</h2>";
        }
        else
        {
            echo "<h2>Sorry, we have some problem</h2>";
        }
    }
    else
    {
        echo "<h2>Please login first</h2>";
    }

?>