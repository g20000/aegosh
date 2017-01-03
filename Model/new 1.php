<?php

include 'Discount.php'

class QuantityDiscount extends Discount
{
	public $quantityProductForDiscount;
	
	public function QuantityDiscount($quantityProductForDiscount) {
        $this->$quantityProductForDiscount = $quantityProductForDiscount;
    }
	
	public function getQuantityProductForDiscount()
	{
		return $this->quantityProductForDiscount;
	}
}

?>