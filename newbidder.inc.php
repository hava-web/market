<h2>Add new bidder</h2>
<form name="newbidder" action="index.php" method="POST">
    <table>
        <tr><td>Bidder ID</td><td><input type="text" name="bidderid"></td></tr>
        <tr><td>Last Name</td><td><input type="text" name="lastname"></td></tr>
        <tr><td>First Name</td><td><input type="text" name="firstname"></td></tr>
        <tr><td>Address</td><td><input type="text" name="address"></td></tr>
        <tr><td>Phone</td><td><input type="text" name="phone"></td></tr>
    </table>
    <div class="input">
        <input type="submit" value="Add new bidder">
        <input type="hidden" name="content" value="addbidder">
    </div>
</form>
<script language="javascript">
    document.newbidder.bidderid.focus();
    document.newbbidder.bidderid.select();
</script>