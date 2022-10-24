<?php
    if(isset($_SESSION['login']))
    {
        $itemid = $_POST['itemid'];
        $answer = $_POST['answer'];
        if($answer == "Update")
        {
            $item = Items::findItem($itemid);
            $item->setItemid($_POST['itemid']);
            $item->setName($_POST['name']);
            $item->setDescription($_POST['description']);
            $item->setResaleprice($_POST['resaleprice']);
            $item->setWinbidder($_POST['winbidder']);
            $item->setWinprice($_POST['winprice']);
            $result = $item->updateItem();
            if($result)
            {
                echo "<h2>Item $itemid updated</h2>";
            }
            else
            {
                echo "<h2>Sorry, we have some problem</h2>";
            }
        }
        else
        {
            echo "<h2>Update cancled for item $itemid</h2>";
        }
    }
    else
    {
        echo "<h2>Please login first</h2>";
    }

?>