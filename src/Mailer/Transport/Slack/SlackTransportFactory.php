<?php

declare(strict_types=1);

namespace App\Mailer\Transport\Slack;

use GuzzleHttp\Client;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\Transport\AbstractTransportFactory;
use Symfony\Component\Mailer\Transport\Dsn;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SlackTransportFactory extends AbstractTransportFactory
{
    public function __construct(
        private readonly string $webhookUrl,
        private readonly Client $guzzleClient,
        EventDispatcherInterface $dispatcher = null,
        HttpClientInterface $httpClient = null, // Unused
        LoggerInterface $logger = null
    ) {
        parent::__construct($dispatcher, $httpClient, $logger);
    }

    /**
     * @return string[]
     */
    protected function getSupportedSchemes(): array
    {
        return ['slack'];
    }

    public function create(Dsn $dsn): TransportInterface
    {
        $transport = new SlackTransport(
            $this->webhookUrl,
            $this->guzzleClient,
            $this->dispatcher,
            $this->logger
        );

        return $transport;
    }
}
