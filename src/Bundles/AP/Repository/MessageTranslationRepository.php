<?php

declare(strict_types=1);

namespace App\Bundles\AP\Repository;

use App\Bundles\AP\Entity\MessageTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MessageTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MessageTranslation::class);
    }
}
