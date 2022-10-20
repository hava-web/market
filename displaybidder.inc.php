<?php
    if((!isset($_REQUEST['bidderid'])) && (!is_numeric($_REQUEST['bidderid'])))
    {
        ?>
        <h2>You did not select a valid bidderid to view</h2>
        <a href="index.php?content=listbidders">List Bidders</a>
        <?php
    }
    else
    {
        $bidderid = $_REQUEST['bidderid'];
        $bidder = Bidders::findBidder($bidderid);
        if($bidder)
        {
            echo $bidder;
            echo "<br><br>\n";
            $items = Items::getItemByBidder($bidderid);
            if($items)
            {
                $itemtotal = 0;
                ?>
                <b>Items Won:</b><br>
                <table>
                    <tr><td><b>Item</b></td><td><b>Name</b></td><td><b>Description</b></td><td>Amount</td></tr>
                <?php
                foreach($items as $item)
                {
                    $id = $item->getItemid();
                ?>
                <tr><td><?php echo printf("%s",$item->getItemid()); ?></td><td><?php echo $item->getName(); ?></td><td><?php echo $item->getDescription();?></td><td><?php echo $item->getWinprice(); ?></td></tr>
               
                <?php
                 $itemtotal = $itemtotal + $item->getWinprice();
                }
                ?>
                <tr><td></td><td><b>Total</b></td><td><?php echo $itemtotal; ?></td></tr>
                </table>
                <?php
            }
            else
            {
                echo "<h2>There are no items won at this time</h2>";
            }
        }
        else
        {
            echo "<h2>Sorry, Bidder $bidderid not found</h2>";
        }
    }

?>
