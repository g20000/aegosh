<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 04.12.2016
 * Time: 23:21
 */
 
include 'Discount.php';
 
class ProductInCollectionDiscount extends Discount
{
	private $productRequiredCollection;
	private $productOptionalCollection;
	
	public function ProductInCollectionDiscount($productRequiredCollection, $productOptionalCollection, $discount) {
	    parent::Discount($discount);
        $this->productRequiredCollection = $productRequiredCollection;
		$this->productOptionalCollection = $productOptionalCollection;
        $this->setDiscount($discount);
    }
	
	public function getProductRequiredCollection()
	{
		return $this->productRequiredCollection;
	}
	
	public function getProductOptionalCollection()
	{
		return $this->productOptionalCollection;
	}
}