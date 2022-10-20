
<script language="javascript">
    function listbox_dblclick()
    {
        document.bidders.displaybidders.click();
    }

    function button_click(target)
    {
        if(target == 0)
        {
            bidders.action="index.php?content=displaybidder";
        }
        if(target == 1)
        {
            bidders.action="index.php?content=removebidder";
        }
        if(target == 2)
        {
            bidders.action="index.php?content=updatebidder";
        }
    }
</script>

<h2>Select Bidder</h2>
<form  name="bidders" method="POST">
    <select name="bidderid" id="" ondblclick="listbox_dblclick()" size="20">
    <?php
       $bidders = Bidders::getBidder();
       foreach($bidders as $bidder) {
        $bidderid = $bidder->getBidderid();
        $name = $bidderid . " - " . $bidder->getLastname() . ", " . $bidder->getFirstname();
        ?>

            <option value="<?php echo $bidderid; ?>"><?php echo $name; ?></option>

        <?php
        }
    ?>
    </select>
    <br>
    <input type="submit" onClick="button_click(0)" name="displaybidder" value="View Bidder">
    <input type="submit" onClick="button_click(1)" name="deletebidder" value="Delete Bidder">
    <input type="submit" onClick="button_click(2)" name="updatebidder" value="Update Bidder">
</form>