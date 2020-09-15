<?php

class Product {
    public string $name;
    public float $price;
    public string $category;
    public string $description;
    public string $expiryDate;
    public int $amount;
    private static string $MASK = " |%-15s |%-6s |%-12s |%-30s |%-12s |%-6s |\n";

    public function __construct($name, $price, $category, $description, $expiryDate, $amount)
    {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
        $this->description = $description;
        $this->expiryDate = $expiryDate;
        $this->amount = $amount;
    }

    public function __toString()
    {
        return sprintf(Product::$MASK, ...array_map(fn($var) => $this->$var, array_keys(get_object_vars($this))));
    }
}
