<?php
    include_once 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-12 login-content">
            <form action="includes/login-inc.php" method="POST">
                <div class="login">
                    <input type="text" name="uid" placeholder="Username/E-mail">
                    <input type="password" name="pwd" placeholder="Password">
                </div>
                <button type="sunmit" name="submit">login</button>
            </form>
            <a href="signup.php">Sign Up</a>
        </div>
    </div>
</div>
<?php
    include_once 'footer.php';
?>