<?php
include_once "db/database.php";
include_once "db/operations.php";

class Review extends database implements operations
{


    private $user_id;
    private $product_id;
    private $comment;
    private $value;
    private $created_at;
    private $updated_at;

    /**
     * Get the value of user_id
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of product_id
     */
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * Set the value of product_id
     *
     * @return  self
     */
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }

    /**
     * Get the value of comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get the value of value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */
    public function setValue($value)
    {
        $this->value = $value;

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
        $query = "SELECT
            `reviews`.`user_id`,
            `reviews`.`product_id`,
            IF(`reviews`.`comment`='','No Comment',`reviews`.`comment`) AS `comment`,
            IF(`reviews`.`value`IS NULL,0,`reviews`.`value`) AS `value`,
            `reviews`.`created_at`,
            `users`.`name` AS `user_name`
        FROM
            `reviews`
        LEFT JOIN `users` ON `reviews`.`user_id` = `users`.`id`
        WHERE
            `product_id` = $this->product_id";
        return $this->runDQL($query);
    }
    public function insertData()
    {
        $query = "INSERT  INTO `reviews`(
            `user_id`,
            `product_id`,
            `comment`,
            `value`
        )
        VALUES($this->user_id, $this->product_id, '$this->comment', $this->value)";
        return $this->runDML($query);
    }
    public function deleteData()
    {
    }
    public function updateData()
    {
        $query = "";
        return $this->runDML($query);
    }
    public function checkIfUserAlreadyAddedReview()
    {
        $query = "SELECT
        `reviews`.*
    FROM
        `reviews`
    WHERE
        `reviews`.`user_id` = $this->user_id AND `reviews`.`product_id` =  $this->product_id";
        return $this->runDML($query);
    }
}
