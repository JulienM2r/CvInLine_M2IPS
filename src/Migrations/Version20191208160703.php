<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191208160703 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cv_hobbie (cv_id INT NOT NULL, hobbie_id INT NOT NULL, INDEX IDX_901BA0D2CFE419E2 (cv_id), INDEX IDX_901BA0D250B678B7 (hobbie_id), PRIMARY KEY(cv_id, hobbie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cv_hobbie ADD CONSTRAINT FK_901BA0D2CFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cv_hobbie ADD CONSTRAINT FK_901BA0D250B678B7 FOREIGN KEY (hobbie_id) REFERENCES hobbie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bloc_contact CHANGE adresse_num_rue adresse_num_rue VARCHAR(255) DEFAULT NULL, CHANGE adresse_cp adresse_cp BIGINT DEFAULT NULL, CHANGE adresse_ville adresse_ville VARCHAR(255) DEFAULT NULL, CHANGE phone_number phone_number VARCHAR(14) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE competances CHANGE logo logo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE cv ADD res_soc_id INT DEFAULT NULL, CHANGE niv_exp_id niv_exp_id INT DEFAULT NULL, CHANGE bloc_contact_id bloc_contact_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE titre titre VARCHAR(255) DEFAULT \'Titre\' NOT NULL, CHANGE photo_avatar photo_avatar VARCHAR(255) DEFAULT \'Anonyme.jpg\' NOT NULL, CHANGE age age INT DEFAULT NULL, CHANGE texte_photo texte_photo VARCHAR(255) DEFAULT \'La rédaction d\'\'un cv nous cause des migraines car dans ce domaine on nous fait marcher sur la tête. Alain Leblay, Consultant RH.\'');
        $this->addSql('ALTER TABLE cv ADD CONSTRAINT FK_B66FFE92D6C72D29 FOREIGN KEY (res_soc_id) REFERENCES reseaux_sociaux (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B66FFE92D6C72D29 ON cv (res_soc_id)');
        $this->addSql('ALTER TABLE experiences CHANGE date_fin date_fin VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE formation CHANGE date_fin date_fin VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE framework_logiciel CHANGE logo logo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE hobbie ADD cv_id INT DEFAULT NULL, CHANGE logo logo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE hobbie ADD CONSTRAINT FK_1D9CA9F7CFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
        $this->addSql('CREATE INDEX IDX_1D9CA9F7CFE419E2 ON hobbie (cv_id)');
        $this->addSql('ALTER TABLE reseaux_sociaux DROP FOREIGN KEY FK_79E212C8CFE419E2');
        $this->addSql('DROP INDEX IDX_79E212C8CFE419E2 ON reseaux_sociaux');
        $this->addSql('ALTER TABLE reseaux_sociaux DROP cv_id, CHANGE logo logo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE techno CHANGE logo logo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE cv_id cv_id INT DEFAULT NULL, CHANGE edited_at edited_at DATETIME DEFAULT NULL, CHANGE roles roles JSON NOT NULL, CHANGE api_token api_token VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE cv_hobbie');
        $this->addSql('ALTER TABLE bloc_contact CHANGE adresse_num_rue adresse_num_rue VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE adresse_cp adresse_cp BIGINT DEFAULT NULL, CHANGE adresse_ville adresse_ville VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE phone_number phone_number VARCHAR(14) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE competances CHANGE logo logo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE cv DROP FOREIGN KEY FK_B66FFE92D6C72D29');
        $this->addSql('DROP INDEX UNIQ_B66FFE92D6C72D29 ON cv');
        $this->addSql('ALTER TABLE cv DROP res_soc_id, CHANGE niv_exp_id niv_exp_id INT DEFAULT NULL, CHANGE bloc_contact_id bloc_contact_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE titre titre VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'\'\'Titre\'\'\' NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE photo_avatar photo_avatar VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'\'\'Anonyme.jpg\'\'\' NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE texte_photo texte_photo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'\'\'La rédaction d\'\'\'\'un cv nous cause des migraines car dans ce domaine on nous fait marcher sur la tête. Alain Leblay, Consultant RH.\'\'\' COLLATE `utf8mb4_unicode_ci`, CHANGE age age INT DEFAULT NULL');
        $this->addSql('ALTER TABLE experiences CHANGE date_fin date_fin VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE formation CHANGE date_fin date_fin VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE framework_logiciel CHANGE logo logo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE hobbie DROP FOREIGN KEY FK_1D9CA9F7CFE419E2');
        $this->addSql('DROP INDEX IDX_1D9CA9F7CFE419E2 ON hobbie');
        $this->addSql('ALTER TABLE hobbie DROP cv_id, CHANGE logo logo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE reseaux_sociaux ADD cv_id INT NOT NULL, CHANGE logo logo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE reseaux_sociaux ADD CONSTRAINT FK_79E212C8CFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
        $this->addSql('CREATE INDEX IDX_79E212C8CFE419E2 ON reseaux_sociaux (cv_id)');
        $this->addSql('ALTER TABLE techno CHANGE logo logo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE cv_id cv_id INT DEFAULT NULL, CHANGE api_token api_token VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE edited_at edited_at DATETIME DEFAULT \'NULL\'');
    }
}
