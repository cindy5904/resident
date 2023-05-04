<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230504150037 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE residents ADD carte_supprimee VARCHAR(50) DEFAULT NULL, CHANGE date_de_mise_en_incomplet date_de_mise_en_incomplet DATE DEFAULT NULL, CHANGE date_de_reponse_administre date_de_reponse_administre DATE DEFAULT NULL, CHANGE date_envoi_carte date_envoi_carte DATE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE residents DROP carte_supprimee, CHANGE date_de_mise_en_incomplet date_de_mise_en_incomplet DATETIME DEFAULT NULL, CHANGE date_de_reponse_administre date_de_reponse_administre DATETIME DEFAULT NULL, CHANGE date_envoi_carte date_envoi_carte DATETIME DEFAULT NULL');
    }
}
