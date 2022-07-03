<?php
include_once "layout/header.php";
?>


<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4>   Email Verification</h4>
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
                                        <input type="email" name="email" placeholder="Email">
                                        <?php
                                        if (isset($_SESSION['message']['errors']['email'])) {
                                            foreach ($_SESSION['message']['errors']['email'] as $error) {
                                                echo $error;
                                            }
                                        }
                                        ?>
                                        <div class="button-box">
                                            <button type="submit" name="email-verify"><span>Send</span></button>
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