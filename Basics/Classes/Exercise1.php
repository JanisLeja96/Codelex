<?php

Class Product {
    private string $name;
    private float $price;
    private int $amount;

    public function __construct(string $name, float $price_at_start, int $amount_at_start) {
        $this->name = $name;
        $this->price = $price_at_start;
        $this->amount = $amount_at_start;
    }

    public function print_product() {
        return "{$this->name}, price {$this->price}, amount {$this->amount}";
    }

    public function setQTY(int $qty) {
        $this->amount = $qty;
    }

    public function setPrice(int $price) {
        $this->price = $price;
    }
}

$mouse = new Product('Logitech mouse', 70.00, 14);
$iPhone = new Product('iPhone 5s', 999.99, 3);
$printer = new Product('Epson EB-U05', 440.46, 1);

$products = [$mouse, $iPhone, $printer];
foreach ($products as $product) {
    echo $product->print_product();
    echo "\n";
}