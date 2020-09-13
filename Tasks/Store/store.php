<?php

require 'Buyer.php';
require 'Product.php';

class Store {

    private array $stock = [];
    private $databaseFile;
    private Buyer $buyer;
    private string $mask = " |%-15s |%-6s |%-12s |%-30s |%-12s |%-6s |\n";
    private array $fields = ['Name', 'Price', 'Category', 'Description', 'Expiry date', 'Amount'];

    public function __construct()
    {
        $this->databaseFile = fopen('database.csv', 'r+');
        while (!feof($this->databaseFile)) {
            $entry = fgetcsv($this->databaseFile);
            if (gettype($entry) == 'array') {
                if ($entry[0] == 'Name') {
                    continue;
                }
                $this->stock[] = new Product($entry[0], $entry[1], $entry[2], $entry[3], $entry[4], $entry[5]);
            }
        }
        $this->buyer = new Buyer();
        fclose($this->databaseFile);
    }

    private function printTable()
    {
        $headerLength = printf($this->mask, ...$this->fields);
        $borderLength = 0;
        while ($borderLength <= $headerLength) {
            echo "_";
            $borderLength++;
        }
        echo "\n";
    }

    public function findByName(string $name)
    {
        foreach ($this->stock as $product) {
            if (strtolower($product->name) == strtolower($name)) {
                return $product;
            }
        }
        return false;
    }

    public function sell(string $name, int $amount)
    {
        if ($this->findByName($name)->amount >= $amount) {
            $this->findByName($name)->amount -= $amount;
            $this->buyer->money -= $this->findByName($name)->price * $amount;
            $this->buyer->updateFile();
            $this->saveChanges();
        } else {
            throw new Exception('Not enough units in stock!');
        }

    }

    private function saveChanges()
    {
        $tempfile = fopen('tempfile.csv', 'w+');
        fputcsv($tempfile, [...$this->fields]);
        foreach ($this->stock as $product) {
            fputcsv($tempfile, [$product->name, $product->price, $product->category, $product->description,
                $product->expiryDate, $product->amount]);
        }
        rename('tempfile.csv', 'database.csv');
    }

    public function listSingleProduct(string $name)
    {
        $this->printTable();
        $product = $this->findByName($name);
        printf($this->mask, $product->name, number_format($product->price, 2, '.', ','), $product->category, $product->description,
            $product->expiryDate, $product->amount);

    }

    public function listProducts() {
        $this->printTable();
        foreach ($this->stock as $product) {
            printf($this->mask, $product->name, number_format($product->price, 2, '.', ','), $product->category, $product->description,
                   $product->expiryDate, $product->amount);
        }
    }
}

$store = new Store();

switch ($argv[1]) {
    case 'listAll' :
        $store->listProducts();
        break;
    case 'purchase' :
        if ($argv[3]) {
            if ($store->findByName($argv[2])) {
                try {
                    $store->sell($argv[2], $argv[3]);
                    echo "\n{$argv[3]} unit(-s) of {$store->findByName($argv[2])->name} successfully purchased";
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            } else {
                echo "Product not found!";
            }
        } else {
            echo "Amount not specified!";
        }
        break;
    case 'listInfo' :
        if ($store->findByName($argv[2])) {
            $store->listSingleProduct($argv[2]);
        } else {
            echo "Product not found!";
        }
        break;
    default:
        echo "Available commands:
        purchase [productName] [amount]
        listAll
        listInfo [productName]\n";
}