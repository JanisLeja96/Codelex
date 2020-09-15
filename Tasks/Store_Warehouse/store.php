<?php

require 'Buyer.php';
require 'Product.php';

class Store {

    private array $stock = [];
    private $databaseFile;
    private Buyer $buyer;

    public function __construct()
    {
        $this->databaseFile = fopen('stock.csv', 'r+');
        while (!feof($this->databaseFile)) {
            $entry = fgetcsv($this->databaseFile);
            if (gettype($entry) == 'array') {
                if ($entry[0] == 'Name') {
                    continue;
                }
                $this->stock[] = new Product(...$entry);
            }
        }
        $this->buyer = new Buyer();
        fclose($this->databaseFile);
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

    public function import()
    {
        $warehouseFile = fopen('warehouse.txt', 'r');
        while (!feof($warehouseFile)) {
            $entry = fgetcsv($warehouseFile, 0, '|');
            if (gettype($entry) == 'array') {
                if ($entry[0] == 'Name') {
                    continue;
                }
                if ($this->findByName($entry[0])) {
                    $this->findByName($entry[0])->amount += (int) $entry[5];
                } else {
                    $this->stock[] = new Product(...$entry);
                }

            }
        }
        $this->saveChanges();
    }

    private function saveChanges()
    {
        $fields = ['Name', 'Price', 'Category', 'Description', 'Expiry date', 'Amount'];
        $tempfile = fopen('tempfile.csv', 'w+');
        fputcsv($tempfile, [...$fields]);
        foreach ($this->stock as $product) {
            fputcsv($tempfile,
                [$product->name,
                    $product->price,
                    $product->category,
                    $product->description,
                    $product->expiryDate,
                    $product->amount]);
        }
        rename('tempfile.csv', 'stock.csv');
    }

    public function getStock() {
        return $this->stock;
    }
}

$store = new Store();
$mask = " |%-15s |%-6s |%-12s |%-30s |%-12s |%-6s |\n";
$header = ['Name', 'Price', 'Category', 'Description', 'Expiry date', 'Amount'];
$headerLength = strlen(sprintf($mask, ...$header));


switch ($argv[1]) {
    case 'listAll' :
        printf($mask, ...$header);
        $borderLength = 0;
        while ($borderLength < $headerLength) {
            echo "-";
            $borderLength++;
        }
        echo "\n";
        foreach ($store->getStock() as $product) {
            echo $product;
        }
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
            printf($mask, ...$header);
            $product = $store->findByName($argv[2]);
            $borderLength = 0;
            while ($borderLength < $headerLength) {
                echo "-";
                $borderLength++;
            }
            echo "\n";
            echo $product;
        } else {
            echo "Product not found!";
        }
        break;
    case 'import' :
        $store->import();
        echo "Data from warehouse.txt imported successfully";
        break;
    default:
        echo "Available commands:
        purchase [productName] [amount]
        listAll
        listInfo [productName]
        import\n";
}