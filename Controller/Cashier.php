<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 04.12.2016
 * Time: 23:22
 */

include 'Shop.php';

class Cashier
{
    private $shop;
    private $basket;
    private $products;

    public function Cashier()
    {
        $this->shop = new Shop();
        $this->products = $this->shop.getProducts();
    }
}