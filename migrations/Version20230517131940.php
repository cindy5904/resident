<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230517131940 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise ADD date_an_dernier DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE liste_entreprise DROP carte_delivrees2011, DROP nombre_cartes2012, DROP total_delivre2015');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise DROP date_an_dernier');
        $this->addSql('ALTER TABLE liste_entreprise ADD carte_delivrees2011 INT DEFAULT NULL, ADD nombre_cartes2012 INT DEFAULT NULL, ADD total_delivre2015 INT DEFAULT NULL');
    }
}
