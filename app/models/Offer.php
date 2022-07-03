<?php
include_once "db/database.php";
include_once "db/operations.php";

class Offer extends database implements operations
{


    private $id;
    private $image;
    private $title;
    private $status;
    private $discount;
    private $discount_type;
    private $start_date;
    private $end_date;
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
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

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
     * Get the value of discount
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set the value of discount
     *
     * @return  self
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get the value of discount_type
     */
    public function getDiscount_type()
    {
        return $this->discount_type;
    }

    /**
     * Set the value of discount_type
     *
     * @return  self
     */
    public function setDiscount_type($discount_type)
    {
        $this->discount_type = $discount_type;

        return $this;
    }

    /**
     * Get the value of start_date
     */
    public function getStart_date()
    {
        return $this->start_date;
    }

    /**
     * Set the value of start_date
     *
     * @return  self
     */
    public function setStart_date($start_date)
    {
        $this->start_date = $start_date;

        return $this;
    }

    /**
     * Get the value of end_date
     */
    public function getEnd_date()
    {
        return $this->end_date;
    }

    /**
     * Set the value of end_date
     *
     * @return  self
     */
    public function setEnd_date($end_date)
    {
        $this->end_date = $end_date;

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
        `offers`.*
    FROM
        `offers`
    WHERE
        `offers`.`start_date` <= CURRENT_DATE() AND `offers`.`end_date` >= CURRENT_DATE() ";
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
    public function getProductsByOfferId()
    {
        $query = "SELECT
            `products`.*
        FROM
            `products`
        LEFT JOIN `offers_products` ON `products`.`id` = `offers_products`.`product_id`
        WHERE
            `offers_products`.`offer_id` = $this->id";
        return $this->runDQL($query);
    }
    public function getTopOffers()
    {
        $query = "SELECT
        `offers`.*
    FROM
        `offers`
    WHERE
        `offers`.`start_date` <= CURRENT_DATE() AND `offers`.`end_date` >= CURRENT_DATE()
    ORDER BY
        `offers`.`discount`
    DESC
    LIMIT 2 ";
        return $this->runDQL($query);
    }
}
