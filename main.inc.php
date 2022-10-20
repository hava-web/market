<?php
    if(!isset($_SESSION['login']))
    {

    
?>
<h2>Please login</h2><br>
<form action="index.php" name="login" method="POST">
    <div class="login">
    <div class="info">
    <label for="">User Name</label>
    <input type="text" name="name" size="10">
    </div>
    <div class="info">
    <label for="">Password</label>
    <input type="password" name="password" size="10">
    </div>
    <input type="submit" value="login">
    <input type="hidden" name="content" value="validate">
    </div>
</form>
<?php
    }
    else
    {
?>
    <h2>Welcome to Stoc market</h2>
    <br>
    <p>This program tracks bidder and aution item information</p>
    <p>Please use the link in the navigation window</p>
    <p>Please DO NOT use the browser navigation button !</p>
<?php        
    }
?>
<script language="javascript">
    document.login.name.focus();
    document.login.name.select();

</script>