<?php
include_once "db/database.php";
include_once "db/operations.php";

class Category extends database implements operations
{


    private $id;
    private $name_en;
    private $name_ar;
    private $status;
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
     * Get the value of name_en
     */
    public function getName_en()
    {
        return $this->name_en;
    }

    /**
     * Set the value of name_en
     *
     * @return  self
     */
    public function setName_en($name_en)
    {
        $this->name_en = $name_en;

        return $this;
    }

    /**
     * Get the value of name_ar
     */
    public function getName_ar()
    {
        return $this->name_ar;
    }

    /**
     * Set the value of name_ar
     *
     * @return  self
     */
    public function setName_ar($name_ar)
    {
        $this->name_ar = $name_ar;

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
        $query = "SELECT `categories`.* FROM `categories` ORDER BY `categories`.`name_en` LIMIT 5 ";
        return $this->runDQL($query);
    }
    public function insertData()
    {
        $query = "";
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
    function getProductsByCategoryId()
    {
        $query = "SELECT
            `products`.*
        FROM
            `products`
        LEFT JOIN `subcategories` ON `products`.`subcategory_id` = `subcategories`.`id`
        LEFT JOIN `categories` ON `subcategories`.`category_id` = `categories`.`id`
        WHERE
            `categories`.`id` = $this->id
        ORDER BY
            `products`.`name_en`";
        return $this->runDQL($query);
    }
}
