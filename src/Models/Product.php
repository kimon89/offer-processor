<?php

namespace OfferProcessor\Models;

/**
 * Model representing a product.
 */
class Product
{
    /**
     * Id of product.
     *
     * @var int
     */
    protected $id;
    /**
     * Category of product.
     *
     * @var string
     */
    protected $category;
    /**
     * Price of product.
     *
     * @var float
     */
    protected $price;
    /**
     * Title of product.
     *
     * @var string
     */
    protected $title;
    /**
     * If a product should be included in the total amount calculations.
     *
     * @var bool
     */
    protected $included = true;
    /**
     * The amount of discount.
     *
     * @var float
     */
    protected $discount;

    /**
     * Get the id.
     *
     * @return int [description]
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the id.
     *
     * @param int $id [description]
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the category of the product.
     *
     * @return string [description]
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the category of the product.
     *
     * @param string $category [description]
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * Get the price of the product.
     *
     * @return float [description]
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the price of the product.
     *
     * @param flaot $price [description]
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get the title of the product.
     *
     * @return string [description]
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the title of the product.
     *
     * @param string $title [description]
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns if the product should be included.
     *
     * @return bool [description]
     */
    public function isIncluded()
    {
        return $this->included;
    }

    /**
     * Sets if a product should be included or not.
     *
     * @param bool $included [description]
     */
    public function setIncluded($included)
    {
        $this->included = $included;
    }

    /**
     * Returns the discount of the product.
     *
     * @return float [description]
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Sets the discount of the product.
     *
     * @param float $discount [description]
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }
}
