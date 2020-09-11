<?php

Class SavingsAccount
{
    public float $interest;
    public float $balance;

    public function __construct($balance)
    {
        $this->balance = $balance;
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
$account->interest = $interest;
$months = (int) readline('How long has the account been opened?: ');

for ($i = 1; $i <= $months; $i++) {
    $toDeposit = (float) readline("Enter amount deposited for month {$i}: ");
    $account->deposit($toDeposit);
    $deposited += $toDeposit;

    $toWithdraw = (float) readline("Enter amount withdrawn for month {$i}: ");
    $account->withdraw($toWithdraw);
    $withdrawn += $toWithdraw;

    $earned += ($account->interest / 12) * $account->balance;
    $account->addMonthlyInterest();
}

echo "Total deposited: $".number_format((float) $deposited, 2,'.', ',')."\n";
echo "Total withdrawn: $".number_format((float) $withdrawn, 2, '.', ',')."\n";
echo "Interest earned: $".round($earned, 2)."\n";
echo "Ending balance: $".round($account->balance, 2);




