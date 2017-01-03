<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 04.12.2016
 * Time: 23:21
 */
 
include 'Discount.php'
 
class ProductsCollectionDiscount extends Discount
{
	private $productCollection;
	
	public function ProductsCollectionDiscount($productCollection, $discount) {
        $this->productCollection = $productCollection;
		$this->discount = $discount;
    }
	
	public function getProductCollection()
	{
		return $this->productCollection;
	}
}

?>