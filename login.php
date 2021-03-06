<?php
    include_once "common/header.php"
?>
<?php
    include_once "common/navbar.php"
?>


<!-- breadcrumbs start -->
<div class="breadcrumbs-area breadcrumb-bg ptb-100">
    <div class="container">
        <div class="breadcrumbs text-center">
            <h2 class="breadcrumb-title">login page</h2>
            <ul>
                <li>
                    <a class="active" href="index-2.html">Home</a>
                </li>
                <li>login</li>
            </ul>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<!-- login area end -->
<div class="login-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-content">
                    <div class="login-title">
                        <h4>login</h4>
                        <p>Please login using account detail bellow.</p>
                    </div>
                    <div class="login-form">
                        <form action="#">
                            <input name="user-name" placeholder="Username" type="text">
                            <input name="user-password" placeholder="Password" type="password">
                            <div class="button-remember">
                                <div class="checkbox-remember">
                                    <input id="checkbox" type="checkbox">
                                    <label>Remember me</label>
                                    <a href="#">Forgot your Password?</a>
                                </div>
                                <button class="login-btn" type="submit">Login</button>
                            </div>
                            <div class="new-account">
                                <p>new here ? <a href="register.html">Create an new account .</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- login area end -->


<?php
    include_once "common/subscribe.php";
?>

<?php
    include_once "common/footer.php";
?>

<?php
    include_once "common/jScript.php";
?>