<?php

declare(strict_types=1);

namespace App\Mailer\Transport\Slack;

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\Transport\AbstractTransportFactory;
use Symfony\Component\Mailer\Transport\Dsn;
use Symfony\Component\Mailer\Transport\TransportInterface;

class SlackTransportFactory extends AbstractTransportFactory
{
    public function __construct(
        private readonly string $webhookUrl,
        private readonly string $accessToken,
        private readonly string $refreshToken,
        EventDispatcherInterface $dispatcher = null,
        $client = null, // Unused
        LoggerInterface $logger = null
    ) {
        parent::__construct($dispatcher, $client, $logger);
    }

    protected function getSupportedSchemes(): array
    {
        return ['slack'];
    }

    public function create(Dsn $dsn): TransportInterface
    {
        $transport = new SlackTransport($this->webhookUrl, $this->accessToken, $this->refreshToken, $this->dispatcher, $this->logger);

        return $transport;
    }
}
