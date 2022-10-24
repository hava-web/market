<?php
    if((!isset($_POST['itemid'])) && (!is_numeric($_POST['itemid'])))
    {
        ?>
        <h2>You did not select valid item ID</h2>
        <a href="index.php?content=listitems">List Item</a>
        <?php
    }
    else
    {
        $itemid = $_POST['itemid'];
        $item = Items::findItem($itemid);
        if($item)
        {
            ?>
            <h2>Update Item <?php echo $item->getItemid(); ?></h2>
            <form action="index.php" name="item" method="POST">
                <table>
                    <tr><td>Item ID</td><td><?php echo
                    $item->getItemid();?></td></tr>
                    <tr><td>Name</td><td><input type="text" name="name" value="<?php echo $item->getName(); ?>"></td></tr>
                    <tr><td>Description</td><td><input type="text" name="description" value="<?php echo $item->getDescription(); ?>"></td></tr>
                    <tr><td>Resale Price</td><td><input type="text" name="resaleprice" value="<?php echo $item->getResaleprice(); ?>"></td></tr>
                    <tr><td>Winning Bidder</td><td><input type="text" name="winbidder" value="<?php echo $item->getWinbidder(); ?>" ></td></tr>
                    <tr><td>Winning Price</td><td><input type="text" name="winprice" value="<?php echo $item->getWinprice(); ?>"></td></tr>
                </table>
                <div class="input">
                    <input type="submit" name="answer" value="Update">
                    <input type="submit" name="answer" value="Cancle">
                    <input type="hidden" name="itemid" value="<?php echo $itemid ?>">
                    <input type="hidden" name="content" value="changeitem">
                </div>
            </form>
            <?php
        }
        else
        {
            ?>
            <h2>Sorry, item $itemid not found</h2>
            <a href="index.php?content=listitems">List Item</a>
            <?php
        }
    }

?>
<script language="javascript">
document.items.winbidder.focus();
document.items.winbidder.select();
</script>