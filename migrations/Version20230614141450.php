<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230614141450 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart ADD product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B74584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_BA388B74584665A ON cart (product_id)');
        $this->addSql('ALTER TABLE storage ADD store_id INT DEFAULT NULL, ADD product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE storage ADD CONSTRAINT FK_547A1B34B092A811 FOREIGN KEY (store_id) REFERENCES store (id)');
        $this->addSql('ALTER TABLE storage ADD CONSTRAINT FK_547A1B344584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_547A1B34B092A811 ON storage (store_id)');
        $this->addSql('CREATE INDEX IDX_547A1B344584665A ON storage (product_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart DROP FOREIGN KEY FK_BA388B74584665A');
        $this->addSql('DROP INDEX IDX_BA388B74584665A ON cart');
        $this->addSql('ALTER TABLE cart DROP product_id');
        $this->addSql('ALTER TABLE storage DROP FOREIGN KEY FK_547A1B34B092A811');
        $this->addSql('ALTER TABLE storage DROP FOREIGN KEY FK_547A1B344584665A');
        $this->addSql('DROP INDEX IDX_547A1B34B092A811 ON storage');
        $this->addSql('DROP INDEX IDX_547A1B344584665A ON storage');
        $this->addSql('ALTER TABLE storage DROP store_id, DROP product_id');
    }
}
