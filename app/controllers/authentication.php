<?php
include_once __DIR__ . "/../requests/validationRequest.php";
include_once __DIR__ . "/controller.php";
include_once __DIR__ . "/../models/User.php";
include_once __DIR__ . "/../mail/verification.php";


class authentication extends controller
{

    //user status
    const notVerified = 0;
    const verified = 1;

    public function Register_post($request)
    {
        $validation = new validationRequest;
        $validation->setEmail($request['email']);
        $emailValidationResult = $validation->emailValidation();

        if (!empty($emailValidationResult)) {
            $_SESSION['message']['errors'] = $emailValidationResult;
            $_SESSION['request'] = $request;
        }
        $validation->setPassword($request['password']);
        $validation->setConfirmPassword($request['confirmPassword']);
        $passwordValidationResult = $validation->passwordValidation();
        if (!empty($passwordValidationResult)) {
            $_SESSION['message']['errors'] = $passwordValidationResult;
            $_SESSION['request'] = $request;
        }
        $validation->setPhone($request['phone']);
        $phoneValidationResult = $validation->phoneValidation();

        if (!empty($phoneValidationResult)) {
            $_SESSION['message']['errors'] = $phoneValidationResult;
            $_SESSION['request'] = $request;
        }

        if (!empty($passwordValidationResult) || !empty($emailValidationResult) || !empty($phoneValidationResult)) {
            header('location:../views/Register.php');
            die;
        }

        //insert new user into the data base 
        $user = new User();

        $user->setName($request['name']);
        $user->setPassword($request['password']);
        $user->setEmail($request['email']);
        $user->setPhone($request['phone']);
        $user->setGender($request['gender']);

        // set code to send to user 
        $code = rand(10000, 99999);

        $user->setCode($code);

        // check if user already exists un the db
        $checkEmailResult = $user->checkEmailInDB();
        if (empty($checkEmailResult)) {
            $checkPhoneResult = $user->checkPhoneInDB();
            if (empty($checkPhoneResult)) {
                $result  = $user->insertData();
                if ($result) {
                    //send mail with code to the user 
                    $mail = new verification;
                    $subject = "Verification Code";
                    $body = "<div> Your Verification Code Is:<b>$code</b> <div>";
                    $mailResult = $mail->sendMail($request['email'], $subject, $body);

                    if ($mailResult) {
                        header("location:web.php?email={$request['email']}&verify-cause=registerOrLogin");
                        die;
                    } else {
                        header('location:../views/errors/500.php');
                        die;
                    }
                } else {
                    $_SESSION['message']['errors']['something'] = "<div class='alert alert-danger'> SomeThing Went Wrong </div>";
                    $_SESSION['request'] = $request;
                    header('location:../views/register.php');
                    die;
                }
            } else {
                $_SESSION['message']['errors']['phone']['exists'] = "<div class='alert alert-danger'> User Phone Already Exists </div>";
            $_SESSION['request'] = $request;
            header('location:../views/register.php');
            die;
            }
        } else {
            $_SESSION['message']['errors']['email']['exists'] = "<div class='alert alert-danger'>User Email Already Exists </div>";
            $_SESSION['request'] = $request;
            header('location:../views/register.php');
            die;
        }
    }
    public function index_get()
    {
        header("location:../views/index.php");
        die;
    }
    public function Register_get()
    {
        header("location:../views/Register.php");
        die;
    }
    public function verifyCode_get($request)
    {
        header("location:../views/verify-code.php?email={$request['email']}&verify-cause={$request['verify-cause']}");
        die;
    }
    public function verifyCode_post($request)
    {

        //    print_r($request);die;
        $validation = new validationRequest;
        //get all info about the user while Validate it 
        $validationResult = $validation->urlEmailValidation($request);
        if ($validationResult) {
            //  print_r($validationResult);die;

            if ($validationResult->code == $request['verify-code']) {

                $user = new User;
                //change user status
                $user->setStatus(self::verified);
                $user->setEmail($request['email']);
                $updateResult =  $user->updateStatus();
                //check change status if done
                if ($updateResult) {
                    $validationResult->status = self::verified;

                    //check which reason user need to verify email {registerOrLogin , forget password , new password}
                    if ($request['verify-cause'] == 'registerOrLogin') {
                        $_SESSION['user'] = $validationResult;
                        header('location:web.php?index=true');
                        die;
                    } else if ($request['verify-cause'] == 'forget') {
                        header("location:../routes/web.php?forgetEmail={$request['email']}");
                        die;
                    } else if ($request['verify-cause'] == 'new-password') {
                        //when change password
                    }
                } else {
                    $_SESSION['message']['errors']['something'] = "<div class='alert alert-danger'> SomeThing Went Wrong </div>";
                    $_SESSION['request'] = $request;
                    header("location:../views/verify-code.php?email={$request['email']}&verify-cause={$request['verify-cause']}");
                    die;
                }
            } else {
                $_SESSION['message']['errors']['wrong'] = "<div class='alert alert-danger'>Wrong Code </div>";
                $_SESSION['request'] = $request;
                header("location:../views/verify-code.php?email={$request['email']}&verify-cause={$request['verify-cause']}");
                die;
            }
        } else {
            header("location:../../views/errors/404.php");
            die;
        }
    }
    public function login_post($request)
    {
        //email validation
        $validation = new validationRequest;
        $validation->setEmail($request['email']);
        $emailValidationResult = $validation->emailValidation();

        if (!empty($emailValidationResult)) {
            $_SESSION['message']['errors'] = $emailValidationResult;
            $_SESSION['request'] = $request;
        }
        //password validation
        $validation->setPassword($request['password']);
        $passwordValidationResult = $validation->loginPasswordValidation();
        if (!empty($passwordValidationResult)) {
            $_SESSION['message']['errors'] = $passwordValidationResult;
            $_SESSION['request'] = $request;
        }

        //check if there are errors
        if (!empty($passwordValidationResult) || !empty($emailValidationResult)) {
            header('location:../views/Login.php');
            die;
        }
        //check email in DB
        $user = new User;
        $user->setEmail($request['email']);
        $userData = $user->checkEmailInDB();
        //check if there is a user with this email
        if ($userData) {
            //check password of the user 
            $userDataResult = $userData->fetch_object();
            $user->setPassword($request['password']);
            $password = $user->getPassword();
            if ($userDataResult->password == $password) {
                //check status of the user 
                if ($userDataResult->status == self::verified) {
                    $_SESSION['user'] = $userDataResult;
                    header('location:web.php?index=true');
                } elseif ($userDataResult->status == self::notVerified) {
                    // if user status isn't verified 
                    //send mail with code to the user 
                    $code = $userDataResult->code;
                    $mail = new verification;
                    $subject = "Verification Code";
                    $body = "<div> Your Verification Code Is:<b>$code</b> <div>";
                    $mailResult = $mail->sendMail($request['email'], $subject, $body);

                    if ($mailResult) {
                        header("location:web.php?email={$request['email']}&verify-cause=registerOrLogin");
                        die;
                    } else {
                        header('location:../views/errors/500.php');
                        die;
                    }
                }
            } else {
                $_SESSION['message']['errors']['password']['password-invalid'] = "<div class='alert alert-danger'> Invalid Login Attempt </div>";
                $_SESSION['request'] = $request;
                header('location:../views/Login.php');
                die;
            }
        } else {
            $_SESSION['message']['errors']['email']['email-not-exist'] = "<div class='alert alert-danger'> User not Exists    </div>";
            $_SESSION['request'] = $request;
            header('location:../views/Login.php');
            die;
        }
    }
    public function login_get()
    {
        header("location:../views/Login.php");
        die;
    }
    public function profile_get()
    {
        header("location:../views/Profile.php");
        die;
    }
    public function emailVerification_get()
    {
        header("location:../views/emailVerification.php");
        die;
    }
    public function emailVerification_post($request)
    {
        //email validation
        $validation = new validationRequest;
        $validation->setEmail($request['email']);
        $emailValidationResult = $validation->emailValidation();

        if (!empty($emailValidationResult)) {
            $_SESSION['message']['errors'] = $emailValidationResult;
            $_SESSION['request'] = $request;
            header("location:../views/emailVerification.php");
            die;
        }
        //check email in DB
        $user = new User;
        $user->setEmail($request['email']);
        $userData = $user->checkEmailInDB();
        //check if there is a user with this email
        if ($userData) {
            header("location:web.php?email={$request['email']}&verify-cause=forget");
            die;
        } else {
            $_SESSION['message']['errors']['email']['email-not-exist'] = "<div class='alert alert-danger'> User not Exists    </div>";
            $_SESSION['request'] = $request;
            header("location:../views/emailVerification.php");
            die;
        }

        // print_r($request);die;
    }
    public function newPassword_get($request)
    {
        header("location:../views/newPassword.php?email={$request['forgetEmail']}");
        die;
    }
    public function newPassword_post($request)
    {
        //print_r($request);die;
        $validation = new validationRequest;
        $validation->setEmail($request['email']);
        $emailValidationResult = $validation->emailValidation();

        if (!empty($emailValidationResult)) {
            $_SESSION['message']['errors'] = $emailValidationResult;
            $_SESSION['request'] = $request;
        }
        $validation->setPassword($request['password']);
        $validation->setConfirmPassword($request['confirmPassword']);
        $passwordValidationResult = $validation->passwordValidation();
        if (!empty($passwordValidationResult)) {
            $_SESSION['message']['errors'] = $passwordValidationResult;
            $_SESSION['request'] = $request;
        }

        if (!empty($passwordValidationResult) || !empty($emailValidationResult)) {
            header("location:../views/newPassword.php?email={$request['email']}");
            die;
        }
        //check email in DB
        $user = new User;
        $user->setEmail($request['email']);
        $userData = $user->checkEmailInDB();
        //check if there is a user with this email
        if ($userData) {
            $userPassword = $userData->fetch_object()->password;
            $user->setPassword($request['password']);
            $newPassword = $user->getPassword();
            if ($newPassword == $userPassword) {
                $_SESSION['message']['errors']['password']['same-password'] = "<div class='alert alert-danger'> You Have Entered The Old Password </div>";
                header("location:../views/newPassword.php?email={$request['email']}");
                die;
            }
            $user->updatePassword();
            header('location:web.php?login=true');
            die;
        } else {
            header('location:../views/errors/404.php');
            die;
        }
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        header('location:web.php?login=true');
        die;
    }
}
