<?php

Class Product {
    public string $name;
    public float $price;
    public int $amount;

    public function __construct(string $name, float $price_at_start, int $amount_at_start) {
        $this->name = $name;
        $this->price = $price_at_start;
        $this->amount = $amount_at_start;
    }

    function print_product() {
        echo "{$this->name}, price {$this->price}, amount {$this->amount}";
    }
}

$mouse = new Product('Logitech mouse', 70.00, 14);
$mouse->print_product();