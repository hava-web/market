<?php
    if($_SESSION['login'])
    {
        $bidderid = $_POST['bidderid'];
        $answer = $_POST['answer'];
        if($answer == "Update")
        {
                $bidder = Bidders::findBidder($bidderid);
                $bidder->setBidderid($_POST['bidderid']); 
                $bidder->setLastname($_POST['lastname']);
                $bidder->setFirstname($_POST['firstname']);
                $bidder->setAddress($_POST['address']);
                $bidder->setPhone($_POST['phone']);
                $result = $bidder->updateBidder();
                if($result) 
                {
                    echo "<h2>Bidder $bidderid updated</h2>";
                }
                else
                {
                    echo "<h2>We have som proble</h2>";
                }
        }
        else
        {
            echo "Update cancled ";
        }
    }
    else
    {
        echo "<h2>Please Login first</h2>";
    }

?>