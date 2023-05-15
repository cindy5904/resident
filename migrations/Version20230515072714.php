<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230515072714 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, denomination_id INT DEFAULT NULL, mode_reglement_id INT DEFAULT NULL, vehicule_vert_id INT DEFAULT NULL, montant_id INT DEFAULT NULL, nom VARCHAR(50) DEFAULT NULL, prenom VARCHAR(50) DEFAULT NULL, marque_vehicule VARCHAR(50) DEFAULT NULL, modele VARCHAR(50) DEFAULT NULL, immatriculation VARCHAR(50) DEFAULT NULL, carte_grise TINYINT(1) DEFAULT NULL, commentaires LONGTEXT DEFAULT NULL, changement_vehicule VARCHAR(50) DEFAULT NULL, carte_supprimee VARCHAR(255) DEFAULT NULL, date_creation DATETIME DEFAULT NULL, numero_de_carte INT DEFAULT NULL, INDEX IDX_D19FA60E9293F06 (denomination_id), INDEX IDX_D19FA60E04B7BE2 (mode_reglement_id), INDEX IDX_D19FA608F4949E1 (vehicule_vert_id), INDEX IDX_D19FA601F8D148 (montant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liste_entreprise (id INT AUTO_INCREMENT NOT NULL, adresse_id INT DEFAULT NULL, denomination VARCHAR(255) DEFAULT NULL, activite VARCHAR(255) DEFAULT NULL, total_salarie INT DEFAULT NULL, commentaires LONGTEXT DEFAULT NULL, type_entreprise VARCHAR(255) DEFAULT NULL, numero_adresse VARCHAR(50) DEFAULT NULL, INDEX IDX_1FF367F64DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE montant_pro (id INT AUTO_INCREMENT NOT NULL, montant DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profession_liberale (id INT AUTO_INCREMENT NOT NULL, adresse_id INT DEFAULT NULL, mode_reglement_id INT DEFAULT NULL, vehicule_vert_id INT DEFAULT NULL, montant_id INT DEFAULT NULL, delivree_par_id INT DEFAULT NULL, numero_carte INT DEFAULT NULL, civilite VARCHAR(50) DEFAULT NULL, nom VARCHAR(50) DEFAULT NULL, prenom VARCHAR(50) DEFAULT NULL, numero_adresse VARCHAR(50) DEFAULT NULL, marque_vehicule VARCHAR(50) DEFAULT NULL, modele VARCHAR(50) DEFAULT NULL, immatriculation VARCHAR(50) DEFAULT NULL, commentaires LONGTEXT DEFAULT NULL, changement_vehicule VARCHAR(50) DEFAULT NULL, carte_supprimee VARCHAR(255) DEFAULT NULL, date_creation DATETIME DEFAULT NULL, INDEX IDX_B46176474DE7DC5C (adresse_id), INDEX IDX_B4617647E04B7BE2 (mode_reglement_id), INDEX IDX_B46176478F4949E1 (vehicule_vert_id), INDEX IDX_B46176471F8D148 (montant_id), INDEX IDX_B46176477E52EE69 (delivree_par_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE travailleur_domicile (id INT AUTO_INCREMENT NOT NULL, mode_reglement_id INT DEFAULT NULL, vehicule_vert_id INT DEFAULT NULL, montant_id INT DEFAULT NULL, civilite VARCHAR(50) DEFAULT NULL, nom VARCHAR(50) DEFAULT NULL, prenom VARCHAR(50) DEFAULT NULL, numero_adresse VARCHAR(50) DEFAULT NULL, marque_vehicule VARCHAR(50) DEFAULT NULL, modele VARCHAR(50) DEFAULT NULL, immatriculation VARCHAR(50) DEFAULT NULL, date_creation2022 DATETIME DEFAULT NULL, numero_carte INT DEFAULT NULL, commentaires LONGTEXT DEFAULT NULL, changement_vehicule VARCHAR(50) DEFAULT NULL, carte_supprimee INT DEFAULT NULL, date_creation2023 DATETIME DEFAULT NULL, INDEX IDX_2B5C04BAE04B7BE2 (mode_reglement_id), INDEX IDX_2B5C04BA8F4949E1 (vehicule_vert_id), INDEX IDX_2B5C04BA1F8D148 (montant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA60E9293F06 FOREIGN KEY (denomination_id) REFERENCES liste_entreprise (id)');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA60E04B7BE2 FOREIGN KEY (mode_reglement_id) REFERENCES mode_reglement (id)');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA608F4949E1 FOREIGN KEY (vehicule_vert_id) REFERENCES vehicule_vert (id)');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA601F8D148 FOREIGN KEY (montant_id) REFERENCES montant_pro (id)');
        $this->addSql('ALTER TABLE liste_entreprise ADD CONSTRAINT FK_1FF367F64DE7DC5C FOREIGN KEY (adresse_id) REFERENCES liste_rue_zone_bleue (id)');
        $this->addSql('ALTER TABLE profession_liberale ADD CONSTRAINT FK_B46176474DE7DC5C FOREIGN KEY (adresse_id) REFERENCES liste_rue_zone_bleue (id)');
        $this->addSql('ALTER TABLE profession_liberale ADD CONSTRAINT FK_B4617647E04B7BE2 FOREIGN KEY (mode_reglement_id) REFERENCES mode_reglement (id)');
        $this->addSql('ALTER TABLE profession_liberale ADD CONSTRAINT FK_B46176478F4949E1 FOREIGN KEY (vehicule_vert_id) REFERENCES vehicule_vert (id)');
        $this->addSql('ALTER TABLE profession_liberale ADD CONSTRAINT FK_B46176471F8D148 FOREIGN KEY (montant_id) REFERENCES montant_pro (id)');
        $this->addSql('ALTER TABLE profession_liberale ADD CONSTRAINT FK_B46176477E52EE69 FOREIGN KEY (delivree_par_id) REFERENCES personne_qui_delivre (id)');
        $this->addSql('ALTER TABLE travailleur_domicile ADD CONSTRAINT FK_2B5C04BAE04B7BE2 FOREIGN KEY (mode_reglement_id) REFERENCES mode_reglement (id)');
        $this->addSql('ALTER TABLE travailleur_domicile ADD CONSTRAINT FK_2B5C04BA8F4949E1 FOREIGN KEY (vehicule_vert_id) REFERENCES vehicule_vert (id)');
        $this->addSql('ALTER TABLE travailleur_domicile ADD CONSTRAINT FK_2B5C04BA1F8D148 FOREIGN KEY (montant_id) REFERENCES montant_pro (id)');
        $this->addSql('ALTER TABLE residents ADD date_an_dernier DATETIME DEFAULT NULL, CHANGE date_de_mise_en_incomplet date_de_mise_en_incomplet DATETIME DEFAULT NULL, CHANGE date_de_completude date_de_completude DATETIME DEFAULT NULL, CHANGE date_de_reponse_administre date_de_reponse_administre DATETIME DEFAULT NULL, CHANGE date_envoi_carte date_envoi_carte DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA60E9293F06');
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA60E04B7BE2');
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA608F4949E1');
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA601F8D148');
        $this->addSql('ALTER TABLE liste_entreprise DROP FOREIGN KEY FK_1FF367F64DE7DC5C');
        $this->addSql('ALTER TABLE profession_liberale DROP FOREIGN KEY FK_B46176474DE7DC5C');
        $this->addSql('ALTER TABLE profession_liberale DROP FOREIGN KEY FK_B4617647E04B7BE2');
        $this->addSql('ALTER TABLE profession_liberale DROP FOREIGN KEY FK_B46176478F4949E1');
        $this->addSql('ALTER TABLE profession_liberale DROP FOREIGN KEY FK_B46176471F8D148');
        $this->addSql('ALTER TABLE profession_liberale DROP FOREIGN KEY FK_B46176477E52EE69');
        $this->addSql('ALTER TABLE travailleur_domicile DROP FOREIGN KEY FK_2B5C04BAE04B7BE2');
        $this->addSql('ALTER TABLE travailleur_domicile DROP FOREIGN KEY FK_2B5C04BA8F4949E1');
        $this->addSql('ALTER TABLE travailleur_domicile DROP FOREIGN KEY FK_2B5C04BA1F8D148');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE liste_entreprise');
        $this->addSql('DROP TABLE montant_pro');
        $this->addSql('DROP TABLE profession_liberale');
        $this->addSql('DROP TABLE travailleur_domicile');
        $this->addSql('ALTER TABLE residents DROP date_an_dernier, CHANGE date_de_mise_en_incomplet date_de_mise_en_incomplet DATE DEFAULT NULL, CHANGE date_de_completude date_de_completude DATE DEFAULT NULL, CHANGE date_de_reponse_administre date_de_reponse_administre DATE DEFAULT NULL, CHANGE date_envoi_carte date_envoi_carte DATE DEFAULT NULL');
    }
}
