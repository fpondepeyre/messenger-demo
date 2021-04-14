<?php

namespace App\MessageHandler;

use App\Message\SubscriptionMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class SubscriptionMessageHandler implements MessageHandlerInterface
{
    public function __invoke(SubscriptionMessage $message)
    {
        // do something with your message
    }
}
