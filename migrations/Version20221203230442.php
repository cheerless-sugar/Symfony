<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221203230442 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actor (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE actor_performance (id INT AUTO_INCREMENT NOT NULL, actor_id INT NOT NULL, performance_id INT NOT NULL, role_id INT NOT NULL, INDEX IDX_65BFB4A10DAF24A (actor_id), INDEX IDX_65BFB4AB91ADEEE (performance_id), INDEX IDX_65BFB4AD60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE performance (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, budget DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, fee DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actor_performance ADD CONSTRAINT FK_65BFB4A10DAF24A FOREIGN KEY (actor_id) REFERENCES actor (id)');
        $this->addSql('ALTER TABLE actor_performance ADD CONSTRAINT FK_65BFB4AB91ADEEE FOREIGN KEY (performance_id) REFERENCES performance (id)');
        $this->addSql('ALTER TABLE actor_performance ADD CONSTRAINT FK_65BFB4AD60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actor_performance DROP FOREIGN KEY FK_65BFB4A10DAF24A');
        $this->addSql('ALTER TABLE actor_performance DROP FOREIGN KEY FK_65BFB4AB91ADEEE');
        $this->addSql('ALTER TABLE actor_performance DROP FOREIGN KEY FK_65BFB4AD60322AC');
        $this->addSql('DROP TABLE actor');
        $this->addSql('DROP TABLE actor_performance');
        $this->addSql('DROP TABLE performance');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
