<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221203231202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE performance_role (id INT AUTO_INCREMENT NOT NULL, performance_id INT NOT NULL, role_id INT NOT NULL, INDEX IDX_9F920457B91ADEEE (performance_id), INDEX IDX_9F920457D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE performance_role ADD CONSTRAINT FK_9F920457B91ADEEE FOREIGN KEY (performance_id) REFERENCES performance (id)');
        $this->addSql('ALTER TABLE performance_role ADD CONSTRAINT FK_9F920457D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE performance_role DROP FOREIGN KEY FK_9F920457B91ADEEE');
        $this->addSql('ALTER TABLE performance_role DROP FOREIGN KEY FK_9F920457D60322AC');
        $this->addSql('DROP TABLE performance_role');
    }
}
