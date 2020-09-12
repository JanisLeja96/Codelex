<?php

class Product {
    public string $name;
    public float $price;
    public string $category;
    public string $description;
    public string $expiryDate;
    public int $amount;

    public function __construct($name, $price, $category, $description, $expiryDate, $amount)
    {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
        $this->description = $description;
        $this->expiryDate = $expiryDate;
        $this->amount = $amount;
    }
}