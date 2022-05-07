<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220507133722 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favorite_tools ADD tags VARCHAR(255) DEFAULT NULL, ADD note VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favorite_tools DROP FOREIGN KEY FK_5C72F55312469DE2');
        $this->addSql('ALTER TABLE favorite_tools DROP FOREIGN KEY FK_5C72F55367B3B43D');
        $this->addSql('ALTER TABLE favorite_tools DROP tags, DROP note');
        $this->addSql('ALTER TABLE tools DROP FOREIGN KEY FK_EAFADE7712469DE2');
        $this->addSql('ALTER TABLE tools CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('DROP INDEX UNIQ_1483A5E95F37A13B ON users');
        $this->addSql('DROP INDEX UNIQ_1483A5E9F85E0677 ON users');
        $this->addSql('ALTER TABLE users_categories DROP FOREIGN KEY FK_ED98E9FC67B3B43D');
        $this->addSql('ALTER TABLE users_categories DROP FOREIGN KEY FK_ED98E9FCA21214B7');
    }
}
