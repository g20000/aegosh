<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 04.12.2016
 * Time: 23:21
 */
class Discount
{
	private $discount;
	
	public function Discount($discount)
	{
		$this->discount = $discount;
	}
	
	public function getDiscount()
	{
		return $this->discount;
	}

	public function setDiscount($discount)
    {
        $this->discount = $discount;
    }
}