<?php

declare(strict_types=1);

namespace App\Bundles\AP\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;

// #[Entity(repositoryClass: ProductRepository::class)]
#[Entity]
#[ORM\Table(name: 'ap_message')]
#[ORM\UniqueConstraint(name: 'unique_idx', columns: ['key', 'language'])]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $key;

    /**
     * @see https://symfony.com/doc/5.4/components/intl.html
     *
     * @var string|null $language Language code
     */
    #[ORM\Column(length: 255)]
    private ?string $language;

    #[ORM\Column]
    private ?string $text = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKey(): ?string
    {
        return $this->key;
    }

    public function setKey(?string $key): void
    {
        $this->key = $key;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): void
    {
        $this->language = $language;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }
}
