<?php

class PostPrice
{
    public $cargoWeight;
    public $pricingPlans;

    public $differ;

    public function __construct(int $cargoWeight, int $pricingPlans, bool $differ)
    {
        $this->cargoWeight = $cargoWeight;
        $this->pricingPlans = $pricingPlans;
        $this->differ = $differ;
    }

    public function costCalculation(): int
    {
        return $this->pricingPlans * $this->cargoWeight;
    }

    public function dd(): int
    {
        if ($this->differ === TRUE && $this->cargoWeight >= 10) {
            $this->pricingPlans = $this->pricingPlans * 10;
            return $this->costCalculation();
        } else {
            return $this->costCalculation();
        }
    }
}

class RuPost extends PostPrice
{
    public function __construct(int $cargoWeight, int $pricingPlans, bool $differ)
    {
        parent::__construct($cargoWeight, $pricingPlans, $differ);
    }

    public function dd(): int
    {
        return parent::dd();
    }
}

class Dhl extends PostPrice
{
    public function __construct(int $cargoWeight, int $pricingPlans, bool $differ)
    {
        parent::__construct($cargoWeight, $pricingPlans, $differ);
    }

    public function dd(): int
    {
        return parent::dd();
    }
}

/**
 * Расчёт тарифа
 *
 * @param {number} cargoWeight — вес груза
 * @param {number} pricingPlans — тариф за килограмм
 * @param {bool} differ - наличие дифференциации тарифа
 * @returns {number}
 *
 */

$ruPost = new RuPost(50, 100, true);
var_dump($ruPost->dd());

$dhl = new Dhl(20, 100, false);
var_dump($dhl->dd());
