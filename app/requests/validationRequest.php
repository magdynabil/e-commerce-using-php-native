<?php
include_once __DIR__ . "/../models/User.php";

class validationRequest
{

    private $email;
    private $password;
    private $confirmPassword;
    private $phone;
    private $errors = [];

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of confirmPassword
     */
    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }

    /**
     * Set the value of confirmPassword
     *
     * @return  self
     */
    public function setConfirmPassword($confirmPassword)
    {
        $this->confirmPassword = $confirmPassword;

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    function emailValidation()
    {
        // email input empty
        if (!$this->email) {
            $this->errors['email']['email-required'] = "<div class='alert alert-danger'> Email Is Required </div>";
        } else {
            // email format validation
            $pattern = "/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/";
            if (!preg_match($pattern, $this->email)) {
                $this->errors['email']['email-format'] = "<div class='alert alert-danger'> Email Format  isn't  Valid  </div>";;
            }
        }

        return $this->errors;
    }
    function passwordValidation()
    {
        // password input empty
        if (!$this->password) {
            $this->errors['password']['password-required'] = "<div class='alert alert-danger'> Password Is Required </div>";
        }
        if (!$this->confirmPassword) {
            $this->errors['password']['confirmPassword-required'] = "<div class='alert alert-danger'> Password Confirmation  Is Required </div>";
        }

        if (empty($this->errors)) {
            // check if Password  & Password Confirmation Are  Identical 
            if ($this->password != $this->confirmPassword) {
                $this->errors['password']['match-password'] = "<div class='alert alert-danger'>Password  & Password Confirmation  Must be Identical  </div>";
            }
            // password format validation
            $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
            if (!preg_match($pattern, $this->password)) {
                $this->errors['password']['password-format'] = "<div class='alert alert-danger'> Password expression that requires one lower case letter, one upper case letter, one digit, 6-13 length, and no spaces.  </div>";;
            }
        }

        return $this->errors;
    }
    function phoneValidation()
    {
        // password input empty
        if (!$this->phone) {
            $this->errors['phone']['phone-required'] = "<div class='alert alert-danger'> Phone Number Is Required </div>";
        }
        $num_length = strlen((string)$this->phone);
        if ($num_length > 11) {
            $this->errors['phone']['phone-over'] = "<div class='alert alert-danger'> Only 11 Numbers Allowed </div>";
        }

        return $this->errors;
    }

    function loginPasswordValidation()
    {
        // password input empty
        if (!$this->password) {
            $this->errors['password']['password-required'] = "<div class='alert alert-danger'> Password Is Required </div>";
        }
        if (empty($this->errors)) {
            // password format validation
            $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
            if (!preg_match($pattern, $this->password)) {
                $this->errors['password']['password-format'] = "<div class='alert alert-danger'> Invalid Login Attempt  </div>";;
            }
        }

        return $this->errors;
    }

    public function urlEmailValidation($request)
    {
        // if there is a get request
        if ($request) {
            if (isset($request['email'])) {
                if ($request['email']) {
                    $checkEmail = new User;
                    $checkEmail->setEmail($request['email']);
                    $userData = $checkEmail->checkEmailInDB();
                    if ($userData) {
                        return ($userData->fetch_object());
                    } else {
                        return [];
                    }
                } else {
                    return [];
                }
            } else {
                return [];
            }
        } else {
            return [];
        }
    }
}
