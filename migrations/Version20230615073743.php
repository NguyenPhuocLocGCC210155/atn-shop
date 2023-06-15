<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230615073743 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE storage ADD st_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE storage ADD CONSTRAINT FK_547A1B3450D46EB FOREIGN KEY (st_id) REFERENCES staff (id)');
        $this->addSql('CREATE INDEX IDX_547A1B3450D46EB ON storage (st_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE storage DROP FOREIGN KEY FK_547A1B3450D46EB');
        $this->addSql('DROP INDEX IDX_547A1B3450D46EB ON storage');
        $this->addSql('ALTER TABLE storage DROP st_id');
    }
}
