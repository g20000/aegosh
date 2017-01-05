<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 04.12.2016
 * Time: 23:19
 */
class Product
{
    private $name;
    private $price;
    private $quantity;

    public function Product($name, $price, $quantity) {
        $this->$name = $name;
        $this->$price = $price;
        $this->$quantity = $quantity;
    }
	
	public function getProductName()
	{
		return $this->name;
	}
	
	public function getProductPrice()
	{
		return $this->price;
	}
	
	public function getProductQuantity()
	{
		return $this->quantity;
	}
}