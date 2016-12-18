<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 04.12.2016
 * Time: 23:19
 */
class Product
{
    public $name;
    public $price;
    public $quantity;

    public function Product($name, $price, $quantity) {
        $this->$name = $name;
        $this->$price = $price;
        $this->$quantity = $quantity;
    }
}