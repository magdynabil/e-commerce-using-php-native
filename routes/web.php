<?php

include_once __DIR__."/../app/controllers/authentication.php";

if(isset($_POST['register'])){
    $authentication = new authentication;
    $authentication->Register_post($_POST);
}
elseif (isset($_GET['register'])) {
    $authentication = new authentication;
    $authentication->Register_get();
}
elseif (isset($_POST['login'])) {
    $authentication = new authentication;
    $authentication->Login_post($_POST);
}
elseif (isset($_GET['login'])) {
    $authentication = new authentication;
    $authentication->Login_get();
}
elseif (isset($_GET['email'])) {
    $authentication = new authentication;
    $authentication->verifyCode_get($_GET);
}
elseif (isset($_POST['verify'])) {
   // print_r($_POST);die;
    $authentication = new authentication;
    $authentication->verifyCode_post($_POST);
}
elseif (isset($_GET['logout'])) {
   // print_r($_POST);die;
    $authentication = new authentication;
    $authentication->logout();
}
elseif (isset($_GET['index'])) {
    $authentication = new authentication;
    $authentication->index_get();
}
elseif (isset($_GET['profile'])) {
    $authentication = new authentication;
    $authentication->profile_get();
}
elseif (isset($_GET['forget'])) {
    $authentication = new authentication;
    $authentication->emailVerification_get();
}
elseif (isset($_POST['email-verify'])) {
    $authentication = new authentication;
    $authentication->emailVerification_post($_POST);
}
elseif (isset($_GET['forgetEmail'])) {
    $authentication = new authentication;
    $authentication->newPassword_get($_GET);
}
elseif (isset($_POST['setForgottenPassword'])) {
    $authentication = new authentication;
    $authentication->newPassword_post($_POST);
}


else {
    header('location:../views/errors/404.php');
}

?>