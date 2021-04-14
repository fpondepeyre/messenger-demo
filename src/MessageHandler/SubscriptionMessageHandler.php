<?php

namespace App\MessageHandler;

use App\Entity\Subscription;
use App\Message\SubscriptionMessage;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class SubscriptionMessageHandler implements MessageHandlerInterface
{
    private $em;
    private $logger;

    public function __construct(EntityManagerInterface $em, LoggerInterface $logger)
    {
        $this->em = $em;
        $this->logger = $logger;
    }

    public function __invoke(SubscriptionMessage $message)
    {
        $subscription = $this->em->getRepository(Subscription::class)->findOneBy([
            'email' => $message->getEmail(),
            'newsletterId' => $message->getNewsletterId()
        ]);

        if (null !== $subscription) {
            $this->logger->info('Subscription already exist', [
                'email' => $message->getEmail(),
                'newsletterId' => $message->getNewsletterId()
            ]);

            return;
        }

        $subscription = new Subscription();
        $subscription->setEmail($message->getEmail());
        $subscription->setNewsletterId($message->getNewsletterId());

        $this->em->persist($subscription);
        $this->em->flush();

        $this->logger->info('Subscription store with success', [
            'email' => $message->getEmail(),
            'newsletterId' => $message->getNewsletterId()
        ]);
    }
}
