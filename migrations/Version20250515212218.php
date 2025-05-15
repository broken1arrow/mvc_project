<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250515212218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__books AS SELECT isbn, title, author, description, plot, image FROM books
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE books
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE books (isbn VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, description CLOB NOT NULL, plot CLOB NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(isbn))
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO books (isbn, title, author, description, plot, image) SELECT isbn, title, author, description, plot, image FROM __temp__books
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__books
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__books AS SELECT isbn, title, author, image, description, plot FROM books
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE books
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE books (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, isbn VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, description CLOB NOT NULL, plot CLOB NOT NULL)
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO books (isbn, title, author, image, description, plot) SELECT isbn, title, author, image, description, plot FROM __temp__books
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE __temp__books
        SQL);
    }
}
