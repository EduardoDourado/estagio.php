<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250129155433 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__pet AS SELECT id, nome, raça, peso, idade FROM pet');
        $this->addSql('DROP TABLE pet');
        $this->addSql('CREATE TABLE pet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome VARCHAR(50) NOT NULL, raca VARCHAR(50) NOT NULL, peso VARCHAR(50) NOT NULL, idade VARCHAR(50) NOT NULL)');
        $this->addSql('INSERT INTO pet (id, nome, raca, peso, idade) SELECT id, nome, raça, peso, idade FROM __temp__pet');
        $this->addSql('DROP TABLE __temp__pet');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__pet AS SELECT id, nome, raca, peso, idade FROM pet');
        $this->addSql('DROP TABLE pet');
        $this->addSql('CREATE TABLE pet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome VARCHAR(50) NOT NULL, raça VARCHAR(50) NOT NULL, peso VARCHAR(50) NOT NULL, idade VARCHAR(50) NOT NULL)');
        $this->addSql('INSERT INTO pet (id, nome, raça, peso, idade) SELECT id, nome, raca, peso, idade FROM __temp__pet');
        $this->addSql('DROP TABLE __temp__pet');
    }
}
