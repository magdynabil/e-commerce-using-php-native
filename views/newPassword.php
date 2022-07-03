<?php
include_once "layout/header.php";
include_once "layout/navbar.php";
?>

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-3 ptb-150">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>NEW PASSWORD</h3>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Set New Password</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> Set New Password </h4>
                        </a>
                    </div>
                    <div class="tab-content">

                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="../routes/web.php" method="post">
                                        <?php
                                        if (isset($_SESSION['message']['errors']['something'])) {
                                            echo $_SESSION['message']['errors']['something'];
                                        }
                                        ?>
                                        <input type="hidden" name="email" value="<?= $_GET['email']?>">
                                        <input type="password" name="password" placeholder="Password">
                                        <input type="password" name="confirmPassword" placeholder="Confirm Password">
                                        <?php
                                        if (isset($_SESSION['message']['errors']['password'])) {
                                            foreach ($_SESSION['message']['errors']['password'] as $error) {
                                                echo $error;
                                            }
                                        }
                                        ?>

                                        <div class="button-box">
                                            <button type="submit" name="setForgottenPassword"><span>Send</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "layout/footer.php";
?>