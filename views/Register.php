<?php
include_once "layout/header.php";
include_once "layout/navbar.php";
?>

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-3 ptb-150">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>REGISTER</h3>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Register</li>
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
                            <h4> register </h4>
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
                                        <input type="text" name="name" placeholder="Username" value="<?=(isset($_SESSION['request']['name']))?$_SESSION['request']['name']:""?>">
                                        <input name="email" placeholder="Email" type="email" value="<?=(isset($_SESSION['request']['email']))?$_SESSION['request']['email']:""?>">
                                        <?php
                                        if (isset($_SESSION['message']['errors']['email'])) {
                                            foreach ($_SESSION['message']['errors']['email'] as $error) {
                                                echo $error;
                                            }
                                        }
                                        ?>
                                        <input type="password" name="password" placeholder="Password">
                                        <?php
                                        if (isset($_SESSION['message']['errors']['password'])) {
                                            foreach ($_SESSION['message']['errors']['password'] as $error) {
                                                echo $error;
                                            }
                                        }
                                        ?>
                                        <input type="password" name="confirmPassword" placeholder="Confirm Password">
                                        <input name="phone" placeholder="Phone Number" type="text" value="<?=(isset($_SESSION['request']['phone']))?$_SESSION['request']['phone']:""?>">
                                        <?php
                                        if (isset($_SESSION['message']['errors']['phone'])) {
                                            foreach ($_SESSION['message']['errors']['phone'] as $error) {
                                                echo $error;
                                            }
                                        }
                                        ?>
                                        <select name="gender" class="form-control mb-4">
                                            <option <?=(isset($_SESSION['request']['gender']) && $_SESSION['request']['gender'] == 'm' )?"selected":""?> value="m">Male</option>
                                            <option <?=(isset($_SESSION['request']['gender']) && $_SESSION['request']['gender'] == 'f' )?"selected":""?> value="f">Female</option>

                                        </select>
                                        <div class="button-box">
                                            <button type="submit" name="register"><span>Register</span></button>
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