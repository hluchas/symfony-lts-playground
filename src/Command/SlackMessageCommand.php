<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

#[AsCommand(name: 'app:slack-message')]
class SlackMessageCommand extends Command
{
    protected static $defaultDescription = 'Sends Slack message via mailer.';

    public function __construct(private readonly MailerInterface $mailer)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            // the command help shown when running the command with the "--help" option
            ->setHelp('This command allows you to create a user...')
            ->addArgument('subject', InputArgument::REQUIRED, 'Subject text')
            ->addArgument('message', InputArgument::REQUIRED, 'Message text')
        ;
    }

    /**
     * @throws TransportExceptionInterface
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $email = (new Email())
            ->from('from@example.com')
            ->to('to@example.com')
            ->subject($input->getArgument('subject'))
            ->text($input->getArgument('message'))
//            ->html('<p>See Twig integration for better HTML integration!</p>')
        ;

        $this->mailer->send($email);

        return Command::SUCCESS;
    }
}
