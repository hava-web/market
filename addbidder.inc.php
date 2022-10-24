<?php
    if(isset($_SESSION['login']))
    {
        $bidderid = $_POST['bidderid'];
        if((trim($bidderid)=='') or (!is_numeric($bidderid)))
        {
            echo "<h2>Sorry, you must enter a valid bidder ID</h2>";
        }
        else
        {
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $bidder = new Bidders($bidderid,$lastname,$firstname,$address,$phone);
            $result = $bidder->saveBidder();
            if($result)
            {
                echo "<h2>Bidder $bidderid added successfully</h2>";
            }
            else
            {
                echo "<h2>Sorry we have some problem</h2>"; 
            }
        }
    }
    else
    {
        echo "<h2>Please login first</h2>";
    }
?>

