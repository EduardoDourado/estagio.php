<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250128155055 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, name, idade, status, created_at FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(50) NOT NULL, idade INTEGER NOT NULL, status BOOLEAN NOT NULL, created_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('INSERT INTO user (id, name, idade, status, created_at) SELECT id, name, idade, status, created_at FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, name, idade, status, created_at FROM "user"');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('CREATE TABLE "user" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(50) NOT NULL, idade INTEGER NOT NULL, status BOOLEAN NOT NULL, created_at DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO "user" (id, name, idade, status, created_at) SELECT id, name, idade, status, created_at FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
    }
}
