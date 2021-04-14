<?php

namespace App\Message;

final class SubscriptionMessage
{
     private $email;
     private $newsletterId;

     public function __construct(string $email, int $newsletterId)
     {
         $this->email = $email;
         $this->newsletterId = $newsletterId;
     }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getNewsletterId(): int
    {
        return $this->newsletterId;
    }
}
