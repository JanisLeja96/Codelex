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

    function setQTY(int $qty) {
        $this->amount = $qty;
    }

    function setPrice(int $price) {
        $this->price = $price;
    }
}

$mouse = new Product('Logitech mouse', 70.00, 14);
$iPhone = new Product('iPhone 5s', 999.99, 3);
$printer = new Product('Epson EB-U05', 440.46, 1);

$products = [$mouse, $iPhone, $printer];
foreach ($products as $product) {
    $product->print_product();
    echo "\n";
}