<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230614094549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category ADD cat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1E6ADA943 FOREIGN KEY (cat_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_64C19C1E6ADA943 ON category (cat_id)');
        $this->addSql('ALTER TABLE suplier ADD suplier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE suplier ADD CONSTRAINT FK_72A65E938299B5EC FOREIGN KEY (suplier_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_72A65E938299B5EC ON suplier (suplier_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1E6ADA943');
        $this->addSql('DROP INDEX IDX_64C19C1E6ADA943 ON category');
        $this->addSql('ALTER TABLE category DROP cat_id');
        $this->addSql('ALTER TABLE suplier DROP FOREIGN KEY FK_72A65E938299B5EC');
        $this->addSql('DROP INDEX IDX_72A65E938299B5EC ON suplier');
        $this->addSql('ALTER TABLE suplier DROP suplier_id');
    }
}
