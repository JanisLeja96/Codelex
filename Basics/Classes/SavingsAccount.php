<?php

Class SavingsAccount
{
    private float $interest;
    private float $balance;

    public function __construct($balance)
    {
        $this->balance = $balance;
    }

    public function setInterest($interest)
    {
        $this->interest = $interest;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function getInterest()
    {
        return $this->interest;
    }

    public function withdraw($amount)
    {
        $this->balance -= $amount;
    }

    public function deposit($amount)
    {
       $this->balance += $amount;
    }

    public function addMonthlyInterest()
    {
        $this->balance += (($this->interest / 12) * $this->balance);
    }
}
$deposited = 0;
$withdrawn = 0;
$earned = 0;

$balance = (float) readline('How much money is in the account?: ');
$interest = (float) readline('Enter the annual interest rate: ');
$account = new SavingsAccount($balance);
$account->setInterest($interest);
$months = (int) readline('How long has the account been opened?: ');

for ($i = 1; $i <= $months; $i++) {
    $toDeposit = (float) readline("Enter amount deposited for month {$i}: ");
    $account->deposit($toDeposit);
    $deposited += $toDeposit;

    $toWithdraw = (float) readline("Enter amount withdrawn for month {$i}: ");
    $account->withdraw($toWithdraw);
    $withdrawn += $toWithdraw;

    $earned += ($account->getInterest() / 12) * $account->getBalance();
    $account->addMonthlyInterest();
}

echo "Total deposited: $".number_format((float) $deposited, 2,'.', ',')."\n";
echo "Total withdrawn: $".number_format((float) $withdrawn, 2, '.', ',')."\n";
echo "Interest earned: $".round($earned, 2)."\n";
echo "Ending balance: $".round($account->getBalance(), 2);




