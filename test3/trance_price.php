<?php

abstract class PostPrice
{
    public $cargoWeight;
    abstract public function costСalculation($cargoWeight);
}

class RuPost extends PostPrice
{
    public function costСalculation($cargoWeight)
    {
        if ($cargoWeight <= 10) {
            return $cargoWeight * 100;
        } else {
            return $cargoWeight * 1000;
        }
    }
}

class DHL extends PostPrice
{
    public function costСalculation($cargoWeight)
    {
        return $cargoWeight * 100;
    }
}

$cargoWeight = 5;
$ruPost = new RuPost();
echo $ruPost->costСalculation($cargoWeight);
