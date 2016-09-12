<?php

namespace OfferProcessor\Models;

/**
 * Model representing an order.
 */
class Order
{
    protected $id;
    protected $products;
    protected $total;

    /**
     * Get id.
     *
     * @return int [description]
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id.
     *
     * @param int $id [description]
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get products of the order.
     *
     * @return array [description]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set the products of the order.
     *
     * @param array $products [description]
     */
    public function setProducts(array $products)
    {
        $this->products = $products;
    }

    /**
     * Get the total amount.
     *
     * @return float [description]
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the total amount.
     *
     * @param float $total [description]
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }
}
