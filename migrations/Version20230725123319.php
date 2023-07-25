<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230725123319 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->skipIf(
            $schema->hasTable('ap_message'),
            "Table 'ap_message' already exists"
        );

        $this->addSql('CREATE TABLE ap_message (id INT AUTO_INCREMENT NOT NULL, `key` VARCHAR(255) NOT NULL, language VARCHAR(255) NOT NULL, text VARCHAR(255) NOT NULL, UNIQUE INDEX unique_idx (`key`, language), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE ap_message');
    }
}
