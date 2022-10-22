
<script language="javascript">
    function listbox_dblclick()
    {
        document.bidders.displaybidders.click();
    }

    function button_click(target)
    {
        if(target == 0)
        {
            bidders.action="index.php?content=removeitem";
        }
        if(target == 1)
        {
            bidders.action="index.php?content=updateitem";
        }
    }
</script>

<h2>Select Bidder</h2>
<form  name="bidders" method="POST">
    <select name="itemid" id="" ondblclick="listbox_dblclick()" size="20">
    <?php
       $items = Items::getItem();
       foreach($items as $item) {
        $itemid = $item->getItemid();
        $name = $item->getName();
        $option = $itemid . " - " . $name;
        ?>

            <option value="<?php echo $itemid; ?>"><?php echo $option; ?></option>

        <?php
        }
    ?>
    </select>
    <br>
    <input type="submit" onClick="button_click(1)" name="deleteitem" value="Delete Item">
    <input type="submit" onClick="button_click(2)" name="updateitem" value="Update Item">
</form>