<?php
    include_once 'header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-12 signup">
            <h2>Signup</h2>
            <form action="includes/signup-inc.php" method="POST">
                <div class="signup-inner">
                    <input type="text" name="first" placeholder="Firstname">
                    <input type="text" name="last" placeholder="Lastname">
                    <input type="text" name="email" placeholder="E-mail">
                    <input type="text" name="uid" placeholder="Username">
                    <input type="text" name="pwd" placeholder="Password">
                </div>
                <button type="submit" name="submit">Sign Up</button>
            </form>
        </div>
    </div>
</div>

<?php
    include_once 'footer.php';
?>