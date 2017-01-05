<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 04.12.2016
 * Time: 23:24
 */
 
include '..\Model\QuantityDiscount.php';
include '..\Model\ProductsCollectionDiscount.php';
include '..\Model\ProductInCollectionDiscount.php';
 
class Shop
{
    private $products;
	private $discounts;

    public function Shop()
    {
        $this->products = [
            "Bread" => new Product("Bread", 2, 2),
            "Milk" => new Product("Milk", 4, 3),
            "Sparkling water" => new Product("Sparkling water", 4, 3),
            "Steel water" => new Product("Steel water", 4, 3),
            "Snikers" => new Product("Snikers", 4, 3),
            "Mars" => new Product("Mars", 4, 3),
            "Pasta" => new Product("Pasta", 4, 3),
            "Sneks" => new Product("Sneks", 4, 3),
            "Alpen gold" => new Product("Alpen gold", 4, 3),
            "Package" => new Product("Package", 4, 3),
            "Sausage" => new Product("Sausage", 4, 3),
            "Tortillia" => new Product("Tortillia", 4, 3),
            "Fish" => new Product("Fish", 4, 3),
            "Meat" => new Product("Meat", 4, 3),
            "Butter" => new Product("Butter", 4, 3)
        ];
		
		$this->discounts = array(
            new ProductsCollectionDiscount(array("Bread", "Milk"), 0.1),
            new ProductsCollectionDiscount(array("Steel water", "Snikers"), 0.05),
            new ProductsCollectionDiscount(array("Snikers", "Mars", "Pasta"), 0.05),
            new ProductInCollectionDiscount(array("Bread"), array("Package", "Sausage", "Tortillia"), 0.05),
            new QuantityDiscount(5, 0.2),
            new QuantityDiscount(4, 0.1),
            new QuantityDiscount(3, 0.05)
        );
    }

    public function getProducts()
    {
        return $this->products;
    }
	
	public function getDiscounts()
    {
        return $this->discounts;
    }
}