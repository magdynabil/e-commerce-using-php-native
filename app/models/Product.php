<?php
include_once "db/database.php";
include_once "db/operations.php";

class Product extends database implements operations
{


    private $id;
    private $name_en;
    private $name_ar;
    private $details_en;
    private $details_ar;
    private $price;
    private $code;
    private $amount;
    private $status;
    private $image;
    private $brand_id;
    private $subcategory_id;
    private $view_number;
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
     * Get the value of details_en
     */
    public function getDetails_en()
    {
        return $this->details_en;
    }

    /**
     * Set the value of details_en
     *
     * @return  self
     */
    public function setDetails_en($details_en)
    {
        $this->details_en = $details_en;

        return $this;
    }

    /**
     * Get the value of details_ar
     */
    public function getDetails_ar()
    {
        return $this->details_ar;
    }

    /**
     * Set the value of details_ar
     *
     * @return  self
     */
    public function setDetails_ar($details_ar)
    {
        $this->details_ar = $details_ar;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

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
     * Get the value of amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

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
     * Get the value of brand_id
     */
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    /**
     * Get the value of subcategory_id
     */
    public function getSubcategory_id()
    {
        return $this->subcategory_id;
    }

    /**
     * Set the value of subcategory_id
     *
     * @return  self
     */
    public function setSubcategory_id($subcategory_id)
    {
        $this->subcategory_id = $subcategory_id;

        return $this;
    }
    /**
     * Get the value of view_number
     */
    public function getView_number()
    {
        return $this->view_number;
    }

    /**
     * Set the value of view_number
     *
     * @return  self
     */
    public function setView_number($view_number)
    {
        $this->view_number = $view_number;
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
            `products`.*
        FROM
            `products`
        ORDER BY
            `products`.`name_en` ASC";
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


    function getProductById()
    {
        $query = "SELECT
            `products`.*,
            COUNT(`reviews`.`product_id`) AS `reviews_count`,
            ROUND(AVG(`reviews`.`value`)) AS `reviews_avg`,
            `brands`.`name_en` AS `brands_name_en`,
            `subcategories`.`name_en` AS `subcategory_name_en`,
            `categories`.`name_en` AS `category_name_en`,
            `categories`.`id` AS `category_id`
        FROM
            `products`
        LEFT JOIN `reviews` ON `products`.`id` = `reviews`.`product_id`
        LEFT JOIN `subcategories`
        ON
            `subcategories`.`id` = `products`.`subcategory_id`
        LEFT JOIN `categories` ON `categories`.`id` = `subcategories`.`category_id`
        LEFT JOIN `brands` ON `brands`.`id` = `products`.`brand_id`
        WHERE
        `products`.`id` = $this->id";
        return $this->runDQL($query);
    }

    function getNewestFourProducts()
    {
        $query = "SELECT * FROM `products` ORDER BY created_at DESC LIMIT 4 ";
        return $this->runDQL($query);
    }
    function getMostRatedProducts()
    {
        $query = "SELECT
        `products`.*,
        COUNT(`reviews`.`product_id`) AS `reviews_count`,
        ROUND(AVG(`reviews`.`value`)) AS `reviews_avg`
    FROM
        `products`
    LEFT JOIN `reviews` ON `reviews`.`product_id` = `products`.`id`
    GROUP BY
        `products`.`id`
    ORDER BY
        `reviews_count`
    DESC
        ,
        `reviews_avg`
    DESC
    LIMIT 4 ";
        return $this->runDQL($query);
    }


    //Most ordered product
    function getMostOrderedProducts()
    {
        $query = "SELECT
    `products`.*,
    SUM(`orders_products`.`quantity`) AS `sumProductPrices`,
    COUNT(`orders_products`.`product_id`) AS `products_count`
    FROM
        `products`
    LEFT JOIN `orders_products` ON `products`.`id` = `orders_products`.`product_id`
    GROUP BY
        `products`.`id`
    ORDER BY
        `products_count`
    DESC
    
    LIMIT 4";
        return $this->runDQL($query);
    }
    //Most purchased product
    function getMostPurchasedProducts()
    {
        $query = "SELECT
    `products`.*,
    SUM(`orders_products`.`quantity`) AS `sumProductPrices`,
    COUNT(`orders_products`.`product_id`) AS `products_count`
    FROM
        `products`
    LEFT JOIN `orders_products` ON `products`.`id` = `orders_products`.`product_id`
    GROUP BY
        `products`.`id`
    ORDER BY
        `sumProductPrices`
    DESC
    
    LIMIT 4";
        return $this->runDQL($query);
    }
    function getProductsBySubCategoryId()
    {
        $query = "SELECT
        `products`.*
    FROM
        `products`
    WHERE
        `products`.`subcategory_id` = $this->subcategory_id
    ORDER BY
        `products`.`name_en`";
        return $this->runDQL($query);
    }
   
    
    function getProductsByBrandId()
    {
        $query = "SELECT
        `products`.*
    FROM
        `products`
    WHERE
        `products`.`brand_id` = $this->brand_id
    ORDER BY
        `products`.`name_en`";
        return $this->runDQL($query);
    }
    function increaseViewNumber()
    {
        $query = "UPDATE
            `products`
        SET
            `products`.`view_number` = `products`.`view_number` +1
        WHERE
            `products`.`id` = $this->id";
        return $this->runDML($query);
    }
    function getMostViewedProducts()
    {
        $query = "SELECT
            *
        FROM
            `products`
        ORDER BY
            `products`.`view_number`
        DESC
        LIMIT 4
            ";
        return $this->runDQL($query);
    }
    function getRelatedProducts()
    {
        $query = "SELECT
        `products`.*
    FROM
        `products`
    WHERE
        `products`.`subcategory_id` = $this->subcategory_id AND `products`.`id` != $this->id
    ORDER BY
        `products`.`name_en`";
        return $this->runDQL($query);
    }
}
