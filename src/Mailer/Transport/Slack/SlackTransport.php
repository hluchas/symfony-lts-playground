<?php

declare(strict_types=1);

namespace App\Mailer\Transport\Slack;

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractTransport;

class SlackTransport extends AbstractTransport
{
    public function __construct(
        private readonly string $webhookUrl,
        private readonly string $accessToken,
        private readonly string $refreshToken,
        EventDispatcherInterface $dispatcher = null,
        LoggerInterface $logger = null
    ) {
        parent::__construct($dispatcher, $logger);
    }

    protected function doSend(SentMessage $message): void
    {
        // TODO: Implement doSend() method.
        throw new \RuntimeException('Not implemented');
    }

    public function __toString(): string
    {
        return $this->webhookUrl;
    }
}
