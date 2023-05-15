<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230515135145 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE travailleur_domicile DROP FOREIGN KEY FK_2B5C04BA8F4949E1');
        $this->addSql('DROP INDEX IDX_2B5C04BA8F4949E1 ON travailleur_domicile');
        $this->addSql('ALTER TABLE travailleur_domicile CHANGE vehicule_vert_id delivree_par_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE travailleur_domicile ADD CONSTRAINT FK_2B5C04BA7E52EE69 FOREIGN KEY (delivree_par_id) REFERENCES personne_qui_delivre (id)');
        $this->addSql('CREATE INDEX IDX_2B5C04BA7E52EE69 ON travailleur_domicile (delivree_par_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE travailleur_domicile DROP FOREIGN KEY FK_2B5C04BA7E52EE69');
        $this->addSql('DROP INDEX IDX_2B5C04BA7E52EE69 ON travailleur_domicile');
        $this->addSql('ALTER TABLE travailleur_domicile CHANGE delivree_par_id vehicule_vert_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE travailleur_domicile ADD CONSTRAINT FK_2B5C04BA8F4949E1 FOREIGN KEY (vehicule_vert_id) REFERENCES vehicule_vert (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_2B5C04BA8F4949E1 ON travailleur_domicile (vehicule_vert_id)');
    }
}
