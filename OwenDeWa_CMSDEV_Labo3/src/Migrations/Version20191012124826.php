<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191012124826 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE camps_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, title VARCHAR(191) NOT NULL, quote VARCHAR(191) NOT NULL, description VARCHAR(191) NOT NULL, locale VARCHAR(191) NOT NULL, INDEX IDX_BCD9443F2C2AC5D3 (translatable_id), UNIQUE INDEX camps_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE camps (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, image VARCHAR(191) NOT NULL, watch TINYINT(1) DEFAULT NULL, likes INT DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, sort INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE camps_translation ADD CONSTRAINT FK_BCD9443F2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES camps (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE camps_translation DROP FOREIGN KEY FK_BCD9443F2C2AC5D3');
        $this->addSql('DROP TABLE camps_translation');
        $this->addSql('DROP TABLE camps');
    }
}
