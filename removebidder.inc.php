<?php
    if(isset($_SESSION['login']))
    {
        $bidderid = $_POST['bidderid'];
        $bidder = Bidders::findBidder($bidderid);
        $result = $bidder->removeBidder();
        if($result)  
        {
            echo "<h2>Bidder $bidderid removed</h2>";
        }
        else
        {
            echo " <h2>Sorry we have some problem</h2>";
        }
    }
    else
    {
        echo "<h2>Please login first</h2>";
    }
?>

