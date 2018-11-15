<?php

class BankAccount implements IfaceBankAccount
{

    public $balance = null;
  
    
    public function __construct(Money $openingBalance)
    {
        $this->balance = $openingBalance;
    }

    public function balance()
    {
        return $this->balance;
    }

    public function deposit(Money $amount)
    {
      
        $this->balance = new Money($amount->value() + $this->balance->value());

    }
    
    public function transfer(Money $amount, BankAccount $account)
    {
       
          $Money_amount =new Money($amount->value());
          $Money_balance= $this->balance();
        

        if($Money_balance < $Money_amount)
        {
        
               throw new Exception("Withdrawl amount larger than balance", 1);
        }
        else
        {

            $this->balance = new Money($this->balance->value() - $amount->value());

            $account->balance =new Money($amount->value() +  $account->balance->__toString());   

        }

    }
    public function withdraw(Money $amount)
    {
        $Money_amount =new Money($amount->value());
        $Money_balance= $this->balance();

    

        if($Money_balance <  $Money_amount)
        {
               throw new Exception("Withdrawl amount larger than balance", 1);
               
        }
        else
        {
              $this->balance = new Money($this->balance->value() - $amount->value()) ;
    
        }
    }
}