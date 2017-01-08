<?php

include 'Discount.php';

class QuantityDiscount extends Discount
{
	private $quantityProductForDiscount;
	
	public function QuantityDiscount($quantityProductForDiscount, $discount) {
        parent::Discount($discount);
        $this->$quantityProductForDiscount = $quantityProductForDiscount;
        $this->setDiscount($discount);
    }
	
	public function getQuantityProductForDiscount()
	{
		return $this->quantityProductForDiscount;
	}

    /**
     * @param mixed $quantityProductForDiscount
     */
    public function setQuantityProductForDiscount($quantityProductForDiscount)
    {
        $this->quantityProductForDiscount = $quantityProductForDiscount;
    }
}