<?php

declare(strict_types=1);

namespace App\Bundles\AP\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Translatable\TranslatableTrait;
use Symfony\Contracts\Translation\TranslatableInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

#[ORM\Entity]
#[ORM\Table(name: 'ap_message')]
class Message implements TranslatableInterface
{
    use TranslatableTrait;

    public const URGENCY_INFO = 'info';
    public const URGENCY_CRITICAL = 'critical';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32)]
    private string $urgency;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrgency(): string
    {
        return $this->urgency;
    }

    public function setUrgency(string $urgency): void
    {
        $this->urgency = $urgency;
    }

    public function trans(TranslatorInterface $translator, string $locale = null): string
    {
        // TODO: Implement trans() method.
    }
}
