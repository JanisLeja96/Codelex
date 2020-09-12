<?php


class Buyer {
    public string $name;
    public float $money;
    public $file;

    public function __construct()
    {
        $this->file = fopen('buyer.txt', 'r');
        $contents = fread($this->file, filesize('buyer.txt'));

        $this->name = explode(' ', $contents)[0];
        $this->money = explode(' ', $contents)[1];
    }

    public function updateFile()
    {
        $tempfile = fopen('tempfile.txt', 'w+');
        fwrite($tempfile, "{$this->name} {$this->money}");
        rename('tempfile.txt', 'buyer.txt');
    }
}