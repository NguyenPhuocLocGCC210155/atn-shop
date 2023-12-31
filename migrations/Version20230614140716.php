<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230614140716 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD cat_id INT DEFAULT NULL, ADD sup_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADE6ADA943 FOREIGN KEY (cat_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADFF790DCD FOREIGN KEY (sup_id) REFERENCES suplier (id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADE6ADA943 ON product (cat_id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADFF790DCD ON product (sup_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADE6ADA943');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADFF790DCD');
        $this->addSql('DROP INDEX IDX_D34A04ADE6ADA943 ON product');
        $this->addSql('DROP INDEX IDX_D34A04ADFF790DCD ON product');
        $this->addSql('ALTER TABLE product DROP cat_id, DROP sup_id');
    }
}
