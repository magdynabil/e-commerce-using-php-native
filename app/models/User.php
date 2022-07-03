<?php
include_once "db/database.php";
include_once "db/operations.php";

class User extends database implements operations
{


    private $id;
    private $name;
    private $phone;
    private $email;
    private $status;
    private $code;
    private $user_type;
    private $gender;
    private $password;
    private $image;
    private $created_at;
    private $updated_at;


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

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
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of user_type
     */
    public function getUser_type()
    {
        return $this->user_type;
    }

    /**
     * Set the value of user_type
     *
     * @return  self
     */
    public function setUser_type($user_type)
    {
        $this->user_type = $user_type;

        return $this;
    }

    /**
     * Get the value of gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

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
        $this->password = sha1($password);

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function selectData()
    {
        $query = "SELECT `users`.* FROM `users`";
        return $this->runDQL($query);
    }
    public function insertData()
    {
        $query = "INSERT INTO `users` (`users`.`name`,`users`.`email`,`users`.`password`,`users`.`phone`,`users`.`gender`,`users`.`code`) 
                    VALUES ('$this->name','$this->email','$this->password','$this->phone','$this->gender','$this->code')";
        return $this->runDML($query);
    }
    public function deleteData()
    {
    }
    public function updateData()
    {
        $query = "UPDATE `users` 
        SET `users`.`name` = '$this->name' ,
            `users`.`phone` = $this->phone ,
            `users`.`gender` = '$this->gender'";
        if ($this->image) {
            $query .= " ,`users`.`image` = '$this->image' ";
        }
        $query .=    "WHERE `users`.`id` = $this->id";
        return $this->runDML($query);
    }

    function checkEmailInDB()
    {
        $query = "SELECT `users`.* FROM `users` WHERE `users`.`email` = '$this->email'";
        return $this->runDQL($query);
    }
    function checkPhoneInDB()
    {
        $query = "SELECT `users`.* FROM `users` WHERE `users`.`phone` = '$this->phone'";
        return $this->runDQL($query);
    }
    function getUserById()
    {
        $query = "SELECT `users`.* FROM `users` WHERE `users`.`id` = '$this->id'";
        return $this->runDQL($query);
    }

    function updateStatus()
    {
        $query = "UPDATE `users` 
        SET `users`.`status` =$this->status
        WHERE `users`.`email` = '$this->email'";
        return $this->runDML($query);
    }
    function updatePassword()
    {
        $query = "UPDATE `users` 
        SET `users`.`password` ='$this->password' 
        WHERE `users`.`email` = '$this->email'";
        return $this->runDML($query);
    }
}
