<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250529113730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE emissions (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, globalwhether_id INTEGER NOT NULL, amount_em INTEGER NOT NULL, CONSTRAINT FK_A12EDB52EC564477 FOREIGN KEY (globalwhether_id) REFERENCES global_whether (id) NOT DEFERRABLE INITIALLY IMMEDIATE)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_A12EDB52EC564477 ON emissions (globalwhether_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            DROP TABLE emissions
        SQL);
    }
}
