<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230614141002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` ADD store_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398B092A811 FOREIGN KEY (store_id) REFERENCES store (id)');
        $this->addSql('CREATE INDEX IDX_F5299398B092A811 ON `order` (store_id)');
        $this->addSql('ALTER TABLE order_detail ADD ord_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE order_detail ADD CONSTRAINT FK_ED896F46E636D3F5 FOREIGN KEY (ord_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_ED896F46E636D3F5 ON order_detail (ord_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398B092A811');
        $this->addSql('DROP INDEX IDX_F5299398B092A811 ON `order`');
        $this->addSql('ALTER TABLE `order` DROP store_id');
        $this->addSql('ALTER TABLE order_detail DROP FOREIGN KEY FK_ED896F46E636D3F5');
        $this->addSql('DROP INDEX IDX_ED896F46E636D3F5 ON order_detail');
        $this->addSql('ALTER TABLE order_detail DROP ord_id');
    }
}
