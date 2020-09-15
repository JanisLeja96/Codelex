<?php

require 'Product.php';

class Warehouse
{
    private array $stock = [];
    private $databaseFile;

    public function __construct()
    {
        $this->databaseFile = fopen('products.csv', 'r+');

        while (!feof($this->databaseFile)) {
            $entry = fgetcsv($this->databaseFile, 0, ';');
            if (gettype($entry) == 'array') {
                if ($entry[0] == 'Name') {
                    continue;
                }
                $this->stock[] = new Product($entry[0], $entry[1], $entry[2], $entry[3], $entry[4], $entry[5]);
            }
        }
    }

    public function export()
    {
        $txtFile = fopen('warehouse.txt', 'w+');
        $header = ['Name', 'Price', 'Category', 'Description', 'Expiry date', 'Amount'];
        fputcsv($txtFile, [...$header], '|');
        foreach ($this->stock as $product) {
            fputcsv($txtFile, [$product->name, $product->price, $product->category, $product->description,
                $product->expiryDate, $product->amount], '|');
        }
    }

    public function getStock()
    {
        return $this->stock;
    }
}

$warehouse = new Warehouse();
$warehouse->export();
$mask = " |%-15s |%-6s |%-12s |%-30s |%-12s |%-6s |\n";
$header = ['Name', 'Price', 'Category', 'Description', 'Expiry date', 'Amount'];
$headerLength = strlen(sprintf($mask, ...$header));

switch ($argv[1]) {
    case 'export' :
        $warehouse->export();
        echo 'warehouse.txt file created successfully';
        break;
    case 'list' :
        printf($mask, ...$header);
        $borderLength = 0;
        while ($borderLength <= $headerLength) {
            echo "-";
            $borderLength++;
        }
        echo "\n";
        foreach ($warehouse->getStock() as $product) {
            printf($mask, $product->name, number_format($product->price, 2), $product->category,
                $product->description, $product->expiryDate, $product->amount);
        }
        break;
    default :
        echo "Available commands: 
        export
        list\n";
        break;
}