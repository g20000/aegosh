<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 04.12.2016
 * Time: 23:22
 */

include 'Shop.php';
include '../Model/Product.php';

class Cashier
{
    private $shop;
    private $basket;
    private $products;
	private $discounts;
	private $sum;

    public function Cashier()
    {
        $this->shop = new Shop();
        $this->sum = 0;
        $this->basket = [
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
		$this->discounts = $this->shop->getDiscounts();
    }

    private function countProductSum()
    {

    }

    private function makeDiscountIfAvailable($products, $discounts)
    {
        foreach ($discounts as &$discount) {
            if (($discount instanceof ProductsCollectionDiscount) && ($this->isAvailableDiscountForProductCollection($discount, $products)))
            {
                $this->makeDiscountForProductsCollection($discount, $products);
            }

            if (($discount instanceof ProductInCollectionDiscount) && ($this->isAvailableDiscountForProductInCollection($discount, $products)))
            {
                $this->makeDiscountForProductInCollection($discount, $products);
            }

            if (($discount instanceof QuantityDiscount) && ($this->isAvailableQuantityDiscount($products)))
            {
                $this->makeQuantityDiscount($discount, $products);
                break;
            }
        }
        unset($discount);
    }

    private function makeDiscountForProductsCollection(ProductsCollectionDiscount $discount, $products)
    {
        $sumForProducts = 0;
        $productCollection = $discount->getProductCollection();
        foreach ($productCollection as $productInCollection) {
            $product = $this->castObjectToProduct($products[$productInCollection]);
            $decreasedProductQuantity = $product->getProductQuantity() - 1;
            $product->setQuantity($decreasedProductQuantity);
            $sumForProducts += $product->getProductPrice();
        }
        $sumForProducts = $sumForProducts - ($sumForProducts * $discount);

        return $this->sum + $sumForProducts;
    }

    private function makeDiscountForProductInCollection(ProductInCollectionDiscount $discount, $products)
    {
        $sumForProducts = 0;
        $productCollection = $discount->getProductRequiredCollection();
        foreach ($productCollection as $productInCollection) {
            $product = $this->castObjectToProduct($products[$productInCollection]);
            $decreasedProductQuantity = $product->getProductQuantity() - 1;
            $product->setQuantity($decreasedProductQuantity);
            $sumForProducts += $product->getProductPrice();
        }

        $productCollection = $discount->getProductOptionalCollection();
        foreach ($productCollection as $productInCollection) {
            $product = $this->castObjectToProduct($products[$productInCollection]);
            if ($product->getProductQuantity() > 0) {
                $decreasedProductQuantity = $product->getProductQuantity() - 1;
                $product->setQuantity($decreasedProductQuantity);
                $sumForProducts += $product->getProductPrice();
                break;
            }
        }

        $sumForProducts = $sumForProducts - ($sumForProducts * $discount);

        return $this->sum + $sumForProducts;
    }

    private function makeQuantityDiscount(QuantityDiscount $discount, $products)
    {
        $sumForProducts = 0;
        switch ($this->availableProductsAmount($products)) {
            case 5:
                break;
            case 4:
                break;
            case 3:
                break;
            default:
                break;
        }
    }

    private function isAvailableDiscountForProductCollection(ProductsCollectionDiscount $discount, $products)
    {
        $productCollection = $discount->getProductCollection();
        foreach ($productCollection as $productInCollection) {
            if (array_key_exists($productInCollection, $products))
            {
                if ($products[$productInCollection] <= 0)
                {
                    return false;
                }
            } else {
                return false;
            }
        }
        return true;
    }

    private function isAvailableDiscountForProductInCollection(ProductInCollectionDiscount $discount, $products)
    {
        $requiredProductCollection = $discount->getProductRequiredCollection();
        foreach ($requiredProductCollection as $productInCollection) {
            if (array_key_exists($productInCollection, $products))
            {
                if ($products[$productInCollection] <= 0)
                {
                    return false;
                }
            } else {
                return false;
            }
        }

        $optionalProductCollection = $discount->getProductOptionalCollection();
        foreach ($optionalProductCollection as $productInCollection) {
            if (array_key_exists($productInCollection, $products))
            {
                if ($products[$productInCollection] <= 0)
                {
                    return false;
                } else {
                    break;
                }
            } else {
                return false;
            }
        }

        return true;
    }

    private function isAvailableQuantityDiscount($products)
    {
        return ($this->availableProductsAmount($products) >= 3);
    }

    private function availableProductsAmount($products)
    {
        $availableProductsAmount = 0;
        foreach($products as $product)
        {
            $productItem = $this->castObjectToProduct($product);
            if ($productItem->getProductQuantity() > 0)
            {
                ++$availableProductsAmount;
            }
        }
        return $availableProductsAmount;
    }

    private function castObjectToProduct(Product $product)
    {
        return $product;
    }

	public function getShop()
	{
		return $this->shop;
	}
	
	public function getBasket()
	{
		return $this->basket;
	}
	
	public function getProducts()
	{
		return $this->products;
	}
}