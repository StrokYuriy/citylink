<?php

abstract class PostPrice
{
    public function __construct(public int $cargoWeight, public int $pricingPlans)
    {
    }

    public function costCalculation(): int
    {
        return $this->pricingPlans * $this->cargoWeight;
    }
}

class RuPost extends PostPrice
{
    public function __construct(int $cargoWeight, int $pricingPlans)
    {
        parent::__construct($cargoWeight, $pricingPlans);
    }

    public function costCalculation(): int
    {
        return parent::costCalculation();
    }

    public function dd(): int
    {
        if ($this->cargoWeight >= 10) {
            $this->pricingPlans = $this->pricingPlans * 10;
            return $this->costCalculation();
        } else {
            return $this->costCalculation();
        }
    }
}

class Dhl extends PostPrice
{
    public function __construct(int $cargoWeight, int $pricingPlans)
    {
        parent::__construct($cargoWeight, $pricingPlans);
    }

    public function costCalculation(): int
    {
        return parent::costCalculation();
    }

    public function dd(): int
    {
            return $this->costCalculation();
    }
}

/**
 * Расчёт тарифа
 *
 * @param {number} cargoWeight — вес груза
 * @param {number} pricingPlans — тариф за килограмм
 * @returns {number}
 *
 */

$ruPost = new RuPost(5, 100);
var_dump($ruPost->dd());

$dhl = new Dhl(20, 100);
var_dump($dhl->dd());

