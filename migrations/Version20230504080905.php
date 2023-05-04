<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230504080905 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carte_provisoire (id INT AUTO_INCREMENT NOT NULL, adresse_id INT DEFAULT NULL, delivree_par_id INT DEFAULT NULL, civilite VARCHAR(50) DEFAULT NULL, nom VARCHAR(50) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, numero_adresse VARCHAR(50) DEFAULT NULL, immatriculation VARCHAR(50) DEFAULT NULL, carte_grise TINYINT(1) DEFAULT NULL, justificatif_moins3_mois TINYINT(1) DEFAULT NULL, commentaires LONGTEXT DEFAULT NULL, date_creation DATETIME DEFAULT NULL, INDEX IDX_1678DB324DE7DC5C (adresse_id), INDEX IDX_1678DB327E52EE69 (delivree_par_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carte_travaux (id INT AUTO_INCREMENT NOT NULL, adresse_id INT DEFAULT NULL, delivree_par_id INT DEFAULT NULL, nom_entreprise_travaux VARCHAR(255) DEFAULT NULL, date_travaux DATETIME DEFAULT NULL, numero_adresse VARCHAR(50) DEFAULT NULL, immatriculation VARCHAR(50) DEFAULT NULL, carte_grise TINYINT(1) DEFAULT NULL, devis TINYINT(1) DEFAULT NULL, commentaires LONGTEXT DEFAULT NULL, date_creation DATETIME DEFAULT NULL, INDEX IDX_3DEC17C14DE7DC5C (adresse_id), INDEX IDX_3DEC17C17E52EE69 (delivree_par_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liste_rue_zone_bleue (id INT AUTO_INCREMENT NOT NULL, adresse VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mode_reglement (id INT AUTO_INCREMENT NOT NULL, mode_reglement VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE montants (id INT AUTO_INCREMENT NOT NULL, montant DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne_qui_delivre (id INT AUTO_INCREMENT NOT NULL, delivree_par VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE residents (id INT AUTO_INCREMENT NOT NULL, adresse_id INT DEFAULT NULL, mode_reglement_id INT DEFAULT NULL, delivree_par_id INT DEFAULT NULL, montant_id INT DEFAULT NULL, vehicule_vert_id INT DEFAULT NULL, civilite VARCHAR(50) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, numero_adresse VARCHAR(50) DEFAULT NULL, numero_appartement INT DEFAULT NULL, marque_vehicule VARCHAR(50) DEFAULT NULL, modele VARCHAR(50) DEFAULT NULL, immatriculation VARCHAR(50) DEFAULT NULL, commentaires LONGTEXT DEFAULT NULL, date_creation DATETIME DEFAULT NULL, demande_courrier TINYINT(1) DEFAULT NULL, demande_internet TINYINT(1) DEFAULT NULL, voie_postale TINYINT(1) DEFAULT NULL, date_de_mise_en_incomplet DATETIME DEFAULT NULL, date_de_completude DATETIME DEFAULT NULL, date_de_reponse_administre DATETIME DEFAULT NULL, numero_dossier INT DEFAULT NULL, date_envoi_carte DATETIME DEFAULT NULL, changement_vehicule VARCHAR(50) DEFAULT NULL, numero_carte INT DEFAULT NULL, attestation_honneur TINYINT(1) DEFAULT NULL, INDEX IDX_F27069E44DE7DC5C (adresse_id), INDEX IDX_F27069E4E04B7BE2 (mode_reglement_id), INDEX IDX_F27069E47E52EE69 (delivree_par_id), INDEX IDX_F27069E41F8D148 (montant_id), INDEX IDX_F27069E48F4949E1 (vehicule_vert_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule_vert (id INT AUTO_INCREMENT NOT NULL, type_vehicule VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carte_provisoire ADD CONSTRAINT FK_1678DB324DE7DC5C FOREIGN KEY (adresse_id) REFERENCES liste_rue_zone_bleue (id)');
        $this->addSql('ALTER TABLE carte_provisoire ADD CONSTRAINT FK_1678DB327E52EE69 FOREIGN KEY (delivree_par_id) REFERENCES personne_qui_delivre (id)');
        $this->addSql('ALTER TABLE carte_travaux ADD CONSTRAINT FK_3DEC17C14DE7DC5C FOREIGN KEY (adresse_id) REFERENCES liste_rue_zone_bleue (id)');
        $this->addSql('ALTER TABLE carte_travaux ADD CONSTRAINT FK_3DEC17C17E52EE69 FOREIGN KEY (delivree_par_id) REFERENCES personne_qui_delivre (id)');
        $this->addSql('ALTER TABLE residents ADD CONSTRAINT FK_F27069E44DE7DC5C FOREIGN KEY (adresse_id) REFERENCES liste_rue_zone_bleue (id)');
        $this->addSql('ALTER TABLE residents ADD CONSTRAINT FK_F27069E4E04B7BE2 FOREIGN KEY (mode_reglement_id) REFERENCES mode_reglement (id)');
        $this->addSql('ALTER TABLE residents ADD CONSTRAINT FK_F27069E47E52EE69 FOREIGN KEY (delivree_par_id) REFERENCES personne_qui_delivre (id)');
        $this->addSql('ALTER TABLE residents ADD CONSTRAINT FK_F27069E41F8D148 FOREIGN KEY (montant_id) REFERENCES montants (id)');
        $this->addSql('ALTER TABLE residents ADD CONSTRAINT FK_F27069E48F4949E1 FOREIGN KEY (vehicule_vert_id) REFERENCES vehicule_vert (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carte_provisoire DROP FOREIGN KEY FK_1678DB324DE7DC5C');
        $this->addSql('ALTER TABLE carte_provisoire DROP FOREIGN KEY FK_1678DB327E52EE69');
        $this->addSql('ALTER TABLE carte_travaux DROP FOREIGN KEY FK_3DEC17C14DE7DC5C');
        $this->addSql('ALTER TABLE carte_travaux DROP FOREIGN KEY FK_3DEC17C17E52EE69');
        $this->addSql('ALTER TABLE residents DROP FOREIGN KEY FK_F27069E44DE7DC5C');
        $this->addSql('ALTER TABLE residents DROP FOREIGN KEY FK_F27069E4E04B7BE2');
        $this->addSql('ALTER TABLE residents DROP FOREIGN KEY FK_F27069E47E52EE69');
        $this->addSql('ALTER TABLE residents DROP FOREIGN KEY FK_F27069E41F8D148');
        $this->addSql('ALTER TABLE residents DROP FOREIGN KEY FK_F27069E48F4949E1');
        $this->addSql('DROP TABLE carte_provisoire');
        $this->addSql('DROP TABLE carte_travaux');
        $this->addSql('DROP TABLE liste_rue_zone_bleue');
        $this->addSql('DROP TABLE mode_reglement');
        $this->addSql('DROP TABLE montants');
        $this->addSql('DROP TABLE personne_qui_delivre');
        $this->addSql('DROP TABLE residents');
        $this->addSql('DROP TABLE vehicule_vert');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
