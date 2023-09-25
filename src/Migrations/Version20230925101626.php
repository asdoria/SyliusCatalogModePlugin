<?php

declare(strict_types=1);

namespace Asdoria\SyliusCatalogModePlugin\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230925101626 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'add catalog_mode field to a sylius_channel table';
    }

    public function up(Schema $schema): void
    {
        if ($schema->getTable('sylius_channel')->hasColumn('catalog_mode')) return;
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_channel ADD catalog_mode TINYINT(1) DEFAULT 0 NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_channel DROP catalog_mode');
    }
}
