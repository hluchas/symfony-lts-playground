<?php

declare(strict_types=1);

namespace App\Bundles\AP\Entity;

use App\Bundles\AP\Repository\MessageTranslationRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;

#[Entity(repositoryClass: MessageTranslationRepository::class)]
#[ORM\Table(name: 'ap_message_translation')]
class MessageTranslation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private string $locale;

    #[ORM\Column]
    private ?string $text = null;

    #[ORM\ManyToOne(targetEntity: Message::class, inversedBy: 'translations')]
    private Message $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): void
    {
        $this->locale = $locale;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    public function getMessage(): Message
    {
        return $this->message;
    }

    public function setMessage(Message $message): void
    {
        $this->message = $message;
    }
}
