<?php
    include_once "common/header.php";
?>

<?php
    include_once "common/navbar.php";
?>

<!-- breadcrumbs start -->
<div class="breadcrumbs-area breadcrumb-bg ptb-100">
    <div class="container">
        <div class="breadcrumbs text-center">
            <h2 class="breadcrumb-title">register page</h2>
            <ul>
                <li>
                    <a class="active" href="index-2.html">Home</a>
                </li>
                <li>register</li>
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
                        <h4>register</h4>
                        <p>Please sign up using account detail bellow.</p>
                    </div>
                    <div class="login-form">
                        <form action="#">
                            <input name="user-name" placeholder="Username" type="text">
                            <input name="user-password" placeholder="Password" type="password">
                            <input name="user-email" placeholder="Email" type="email">
                            <div class="button-remember">
                                <button class="login-btn" type="submit">register</button>
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