<h2>Add new item</h2>
<form action="index.php" name="newitem" method="POST">
    <table>
        <tr><td>Item ID</td><td><input type="text" name="itemid"></td></tr>
        <tr><td>Name</td><td><input type="text" name="name"></td></tr>
        <tr><td>Description</td><td><input type="text" name="description"></td></tr>
        <tr><td>Resale Price</td><td><input type="text" name="resaleprice"></td></tr>
        <tr><td>Winning bidder</td><td><input type="text" name="winbidder" ></td></tr>
        <tr><td>Winning Price</td><td><input type="text" name="winprice"></td></tr>
    </table>
    <div class="input">
            <input type="submit" value="Add">
            <input type="hidden" name="content" value="additem">
    </div>
</form>
<script>
    document.newitem.itemid.focus();
    document.newitem.itemid.select();
</script>