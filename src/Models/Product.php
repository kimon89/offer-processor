<?php

namespace OfferProcessor\Models;

/**
 * Model representing a product.
 */
class Product
{
    protected $id;
    protected $category;
    protected $price;
    protected $title;

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
}
