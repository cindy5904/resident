<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230517121929 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE liste_entreprise (id INT AUTO_INCREMENT NOT NULL, adresse_id INT DEFAULT NULL, type_entreprise VARCHAR(255) DEFAULT NULL, denomination VARCHAR(255) DEFAULT NULL, numero_adresse VARCHAR(50) DEFAULT NULL, activite VARCHAR(255) DEFAULT NULL, carte_delivrees2011 INT DEFAULT NULL, nombre_cartes2012 INT DEFAULT NULL, total_salaries INT DEFAULT NULL, total_delivre2015 INT DEFAULT NULL, commentaires LONGTEXT DEFAULT NULL, INDEX IDX_1FF367F64DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE liste_entreprise ADD CONSTRAINT FK_1FF367F64DE7DC5C FOREIGN KEY (adresse_id) REFERENCES liste_rue_zone_bleue (id)');
        $this->addSql('ALTER TABLE entreprise ADD denomination_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA60E9293F06 FOREIGN KEY (denomination_id) REFERENCES liste_entreprise (id)');
        $this->addSql('CREATE INDEX IDX_D19FA60E9293F06 ON entreprise (denomination_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA60E9293F06');
        $this->addSql('ALTER TABLE liste_entreprise DROP FOREIGN KEY FK_1FF367F64DE7DC5C');
        $this->addSql('DROP TABLE liste_entreprise');
        $this->addSql('DROP INDEX IDX_D19FA60E9293F06 ON entreprise');
        $this->addSql('ALTER TABLE entreprise DROP denomination_id');
    }
}
