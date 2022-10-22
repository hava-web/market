<?php
    $bidderid = $_POST['bidderid'];
    $bidder = Bidders::findBidder($bidderid);
    if($bidder)
    {
        ?>
        <h2>Update Bidder <?php echo $bidderid ?></h2>
        <form action="index.php" name="bidder" method="POST">
            <table>
                <tr><td>Bidder ID</td><td><?php echo $bidderid ?></td></tr>
                <tr><td>Last Name</td><td><input type="text" name="lastname" value="<?php echo $bidder->getLastname(); ?>"></td></tr>
                <tr><td>First Name</td><td><input type="text" name="firstname" value="<?php echo $bidder->getFirstname(); ?>"></td></tr>
                <tr><td>Address</td><td><input type="text" name="address" value="<?php echo $bidder->getAddress();?>"></td></tr>
                <tr><td>Phone</td><td><input type="text" name="phone" value="<?php echo $bidder->getPhone(); ?>"></td></tr>
            </table>
            <input type="submit" name="answer" id="" value="Update">
            <input type="submit" name="answer" value="Cancle">
            <input type="hidden" name="bidderid" value="<?php echo $bidderid ?>">
            <input type="hidden" name="content" value="changebidder">
        </form>
        <?php
    }
    else
    {
        echo "<h2>Sorry Bidder $bidderid not found</h2>"; 
    }
?>
<script language="javascript">
    document.bidder.lastname.focus();
    document.bidder.lastname.select();
</script>
