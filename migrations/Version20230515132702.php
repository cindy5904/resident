<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230515132702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise CHANGE numero_de_carte numero_carte INT DEFAULT NULL');
        $this->addSql('ALTER TABLE travailleur_domicile ADD date_creation DATETIME DEFAULT NULL, DROP date_creation2022, DROP date_creation2023');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise CHANGE numero_carte numero_de_carte INT DEFAULT NULL');
        $this->addSql('ALTER TABLE travailleur_domicile ADD date_creation2023 DATETIME DEFAULT NULL, CHANGE date_creation date_creation2022 DATETIME DEFAULT NULL');
    }
}
