<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250529065719 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE global_whether (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, date DATE NOT NULL, temperature DOUBLE PRECISION NOT NULL)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE wildfires (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, globalwhether_id INTEGER NOT NULL, date DATE NOT NULL, amount INTEGER NOT NULL, CONSTRAINT FK_B4B353C1EC564477 FOREIGN KEY (globalwhether_id) REFERENCES global_whether (id) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_B4B353C1EC564477 ON wildfires (globalwhether_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE global_whether
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE wildfires
        SQL);
    }
}
