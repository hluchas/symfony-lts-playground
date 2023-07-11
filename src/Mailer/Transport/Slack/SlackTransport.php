<?php

declare(strict_types=1);

namespace App\Mailer\Transport\Slack;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractTransport;

class SlackTransport extends AbstractTransport
{
    public function __construct(
        private readonly string $webhookUrl,
        private readonly Client $client,
        EventDispatcherInterface $dispatcher = null,
        LoggerInterface $logger = null
    ) {
        parent::__construct($dispatcher, $logger);
    }

    protected function doSend(SentMessage $message): void
    {
        $rawMessage = $message->toString();
        $rawMessage = str_replace('<br>', PHP_EOL, $rawMessage); // Replace HTML tag with new line
        $rawMessage = strip_tags($rawMessage); // Remove HTML tags

        $this->client->request(Request::METHOD_POST, $this->webhookUrl, [
            RequestOptions::JSON => [
                'text' => $rawMessage,
            ],
        ]);

        $this->getLogger()->info('Slack message sent');
    }

    public function __toString(): string
    {
        return $this->webhookUrl;
    }
}
