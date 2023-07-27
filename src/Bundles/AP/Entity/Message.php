<?php

declare(strict_types=1);

namespace App\Bundles\AP\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'ap_message')]
class Message
{
    public const URGENCY_INFO = 'info';
    public const URGENCY_CRITICAL = 'critical';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32)]
    private string $urgency;

    /** @var Collection|MessageTranslation[] $translations */
    #[ORM\OneToMany(mappedBy: 'message', targetEntity: MessageTranslation::class)]
    private Collection $translations;

    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }

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

    public function addTranslations(MessageTranslation $translation): self
    {
        $this->translations->add($translation);

        return $this;
    }

    public function getTranslations(): Collection
    {
        return $this->translations;
    }
}
