<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230614142346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart ADD staff_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B7D4D57CD FOREIGN KEY (staff_id) REFERENCES staff (id)');
        $this->addSql('CREATE INDEX IDX_BA388B7D4D57CD ON cart (staff_id)');
        $this->addSql('ALTER TABLE storage ADD staff_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE storage ADD CONSTRAINT FK_547A1B34D4D57CD FOREIGN KEY (staff_id) REFERENCES staff (id)');
        $this->addSql('CREATE INDEX IDX_547A1B34D4D57CD ON storage (staff_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart DROP FOREIGN KEY FK_BA388B7D4D57CD');
        $this->addSql('DROP INDEX IDX_BA388B7D4D57CD ON cart');
        $this->addSql('ALTER TABLE cart DROP staff_id');
        $this->addSql('ALTER TABLE storage DROP FOREIGN KEY FK_547A1B34D4D57CD');
        $this->addSql('DROP INDEX IDX_547A1B34D4D57CD ON storage');
        $this->addSql('ALTER TABLE storage DROP staff_id');
    }
}
