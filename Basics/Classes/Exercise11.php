<?php

class Account
{
    public string $name;
    public float $balance;

    public function __construct($name, $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function __toString()
    {
        return "Name: {$this->name}, Balance: {$this->balance()}\n";
    }

    public function withdrawal($amount)
    {
        $this->balance -= $amount;
    }

    public function deposit($amount)
    {
        $this->balance += $amount;
    }

    public function balance()
    {
        return number_format((float) ($this->balance), 2, '.', ',');
    }

}
$myFirstAccount = new Account('My first account', 100.00);
$myFirstAccount->deposit(20);
echo $myFirstAccount;

$mattsAccount = new Account("Matt's account", 1000);
$myAccount = new Account("My account", 0);
$mattsAccount->withdrawal(100);
$myAccount->deposit(100);

echo $mattsAccount, $myAccount;

function transfer(Account $from, Account $to, int $howMuch)
{
    $from->withdrawal($howMuch);
    $to->deposit($howMuch);
}

$accountA = new Account('A', 100);
$accountB = new Account('B', 100);
$accountC = new Account('C', 100);

transfer($accountA, $accountB, 50);
transfer($accountB, $accountC, 25);

echo $accountA, $accountB, $accountC;