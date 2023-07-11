<?php

declare(strict_types=1);

namespace App\Tests\Unit\Mailer\Transport\Slack;

use App\Mailer\Transport\Slack\SlackTransport;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mime\Email;

class SlackTransportTest extends TestCase
{
    private const WEBHOOK_URL = 'https://example.com';
    private Client|MockObject $client;
    private EventDispatcherInterface|MockObject $eventDispatcher;
    private LoggerInterface|MockObject $logger;
    private SlackTransport $transport;

    protected function setUp(): void
    {
        $this->client = $this->createMock(Client::class);
        $this->eventDispatcher = $this->createMock(EventDispatcherInterface::class);
        $this->logger = $this->createMock(LoggerInterface::class);

        $this->transport = new SlackTransport(
            self::WEBHOOK_URL,
            $this->client,
            $this->eventDispatcher,
            $this->logger
        );

        parent::setUp();
    }

    public function testSend(): void
    {
        $message = (new Email())
            ->from('from@example.com')
            ->to('to@example.com')
            ->subject('subject')
            ->text('message');

        $this->client->expects($this->once())
            ->method('request')
            ->with(Request::METHOD_POST, self::WEBHOOK_URL, [
                RequestOptions::JSON => [
                    'text' => $message->toString(),
                ],
            ]);

        $this->logger->expects($this->once())
            ->method('info')
            ->with('Slack message sent');

        $this->transport->send($message);
    }
}
