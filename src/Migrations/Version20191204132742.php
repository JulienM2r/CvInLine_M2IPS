<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191204132742 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE experiences_category (experiences_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_94229BC423DE140 (experiences_id), INDEX IDX_94229BC12469DE2 (category_id), PRIMARY KEY(experiences_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experiences_competances (experiences_id INT NOT NULL, competances_id INT NOT NULL, INDEX IDX_4A7731F6423DE140 (experiences_id), INDEX IDX_4A7731F6222ABFA2 (competances_id), PRIMARY KEY(experiences_id, competances_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experiences_techno (experiences_id INT NOT NULL, techno_id INT NOT NULL, INDEX IDX_2B4695D4423DE140 (experiences_id), INDEX IDX_2B4695D451F3C1BC (techno_id), PRIMARY KEY(experiences_id, techno_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experiences_framework_logiciel (experiences_id INT NOT NULL, framework_logiciel_id INT NOT NULL, INDEX IDX_279629F2423DE140 (experiences_id), INDEX IDX_279629F2C7A79146 (framework_logiciel_id), PRIMARY KEY(experiences_id, framework_logiciel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_category (formation_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_C1DE4E305200282E (formation_id), INDEX IDX_C1DE4E3012469DE2 (category_id), PRIMARY KEY(formation_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_competances (formation_id INT NOT NULL, competances_id INT NOT NULL, INDEX IDX_715DF1D55200282E (formation_id), INDEX IDX_715DF1D5222ABFA2 (competances_id), PRIMARY KEY(formation_id, competances_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_techno (formation_id INT NOT NULL, techno_id INT NOT NULL, INDEX IDX_199EE0F15200282E (formation_id), INDEX IDX_199EE0F151F3C1BC (techno_id), PRIMARY KEY(formation_id, techno_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_framework_logiciel (formation_id INT NOT NULL, framework_logiciel_id INT NOT NULL, INDEX IDX_64705C425200282E (formation_id), INDEX IDX_64705C42C7A79146 (framework_logiciel_id), PRIMARY KEY(formation_id, framework_logiciel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niv_exp (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_competances (project_id INT NOT NULL, competances_id INT NOT NULL, INDEX IDX_E66F26F5166D1F9C (project_id), INDEX IDX_E66F26F5222ABFA2 (competances_id), PRIMARY KEY(project_id, competances_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_techno (project_id INT NOT NULL, techno_id INT NOT NULL, INDEX IDX_2E230596166D1F9C (project_id), INDEX IDX_2E23059651F3C1BC (techno_id), PRIMARY KEY(project_id, techno_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_framework_logiciel (project_id INT NOT NULL, framework_logiciel_id INT NOT NULL, INDEX IDX_5F807BB2166D1F9C (project_id), INDEX IDX_5F807BB2C7A79146 (framework_logiciel_id), PRIMARY KEY(project_id, framework_logiciel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE experiences_category ADD CONSTRAINT FK_94229BC423DE140 FOREIGN KEY (experiences_id) REFERENCES experiences (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE experiences_category ADD CONSTRAINT FK_94229BC12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE experiences_competances ADD CONSTRAINT FK_4A7731F6423DE140 FOREIGN KEY (experiences_id) REFERENCES experiences (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE experiences_competances ADD CONSTRAINT FK_4A7731F6222ABFA2 FOREIGN KEY (competances_id) REFERENCES competances (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE experiences_techno ADD CONSTRAINT FK_2B4695D4423DE140 FOREIGN KEY (experiences_id) REFERENCES experiences (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE experiences_techno ADD CONSTRAINT FK_2B4695D451F3C1BC FOREIGN KEY (techno_id) REFERENCES techno (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE experiences_framework_logiciel ADD CONSTRAINT FK_279629F2423DE140 FOREIGN KEY (experiences_id) REFERENCES experiences (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE experiences_framework_logiciel ADD CONSTRAINT FK_279629F2C7A79146 FOREIGN KEY (framework_logiciel_id) REFERENCES framework_logiciel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_category ADD CONSTRAINT FK_C1DE4E305200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_category ADD CONSTRAINT FK_C1DE4E3012469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_competances ADD CONSTRAINT FK_715DF1D55200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_competances ADD CONSTRAINT FK_715DF1D5222ABFA2 FOREIGN KEY (competances_id) REFERENCES competances (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_techno ADD CONSTRAINT FK_199EE0F15200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_techno ADD CONSTRAINT FK_199EE0F151F3C1BC FOREIGN KEY (techno_id) REFERENCES techno (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_framework_logiciel ADD CONSTRAINT FK_64705C425200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation_framework_logiciel ADD CONSTRAINT FK_64705C42C7A79146 FOREIGN KEY (framework_logiciel_id) REFERENCES framework_logiciel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_competances ADD CONSTRAINT FK_E66F26F5166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_competances ADD CONSTRAINT FK_E66F26F5222ABFA2 FOREIGN KEY (competances_id) REFERENCES competances (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_techno ADD CONSTRAINT FK_2E230596166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_techno ADD CONSTRAINT FK_2E23059651F3C1BC FOREIGN KEY (techno_id) REFERENCES techno (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_framework_logiciel ADD CONSTRAINT FK_5F807BB2166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_framework_logiciel ADD CONSTRAINT FK_5F807BB2C7A79146 FOREIGN KEY (framework_logiciel_id) REFERENCES framework_logiciel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bloc_contact ADD email VARCHAR(255) DEFAULT NULL, ADD anonymous TINYINT(1) NOT NULL, CHANGE adresse_num_rue adresse_num_rue VARCHAR(255) DEFAULT NULL, CHANGE adresse_cp adresse_cp BIGINT DEFAULT NULL, CHANGE adresse_ville adresse_ville VARCHAR(255) DEFAULT NULL, CHANGE phone_number phone_number VARCHAR(14) DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD cv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1CFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
        $this->addSql('CREATE INDEX IDX_64C19C1CFE419E2 ON category (cv_id)');
        $this->addSql('ALTER TABLE competances ADD name VARCHAR(255) NOT NULL, ADD logo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE cv ADD niv_exp_id INT NOT NULL, ADD statut TINYINT(1) NOT NULL, CHANGE photo_avatar photo_avatar VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE cv ADD CONSTRAINT FK_B66FFE9262E35A FOREIGN KEY (niv_exp_id) REFERENCES niv_exp (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B66FFE9262E35A ON cv (niv_exp_id)');
        $this->addSql('ALTER TABLE experiences ADD name VARCHAR(255) NOT NULL, ADD date_debut DATETIME NOT NULL, ADD date_fin DATETIME DEFAULT NULL, ADD entreprise VARCHAR(255) NOT NULL, ADD poste VARCHAR(255) NOT NULL, ADD description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE formation ADD cv_id INT NOT NULL, ADD description LONGTEXT NOT NULL, CHANGE date_fin date_fin DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFCFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
        $this->addSql('CREATE INDEX IDX_404021BFCFE419E2 ON formation (cv_id)');
        $this->addSql('ALTER TABLE framework_logiciel CHANGE logo logo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE hobbie ADD name VARCHAR(255) NOT NULL, ADD logo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE project ADD cv_id INT NOT NULL');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EECFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EECFE419E2 ON project (cv_id)');
        $this->addSql('ALTER TABLE reseaux_sociaux CHANGE logo logo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE techno ADD name VARCHAR(255) NOT NULL, ADD logo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD firstname VARCHAR(255) NOT NULL, ADD lastname VARCHAR(255) NOT NULL, CHANGE edited_at edited_at DATETIME DEFAULT NULL, CHANGE roles roles JSON NOT NULL, CHANGE api_token api_token VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cv DROP FOREIGN KEY FK_B66FFE9262E35A');
        $this->addSql('DROP TABLE experiences_category');
        $this->addSql('DROP TABLE experiences_competances');
        $this->addSql('DROP TABLE experiences_techno');
        $this->addSql('DROP TABLE experiences_framework_logiciel');
        $this->addSql('DROP TABLE formation_category');
        $this->addSql('DROP TABLE formation_competances');
        $this->addSql('DROP TABLE formation_techno');
        $this->addSql('DROP TABLE formation_framework_logiciel');
        $this->addSql('DROP TABLE niv_exp');
        $this->addSql('DROP TABLE project_competances');
        $this->addSql('DROP TABLE project_techno');
        $this->addSql('DROP TABLE project_framework_logiciel');
        $this->addSql('ALTER TABLE bloc_contact DROP email, DROP anonymous, CHANGE adresse_num_rue adresse_num_rue VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE adresse_cp adresse_cp BIGINT DEFAULT NULL, CHANGE adresse_ville adresse_ville VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE phone_number phone_number VARCHAR(14) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1CFE419E2');
        $this->addSql('DROP INDEX IDX_64C19C1CFE419E2 ON category');
        $this->addSql('ALTER TABLE category DROP cv_id');
        $this->addSql('ALTER TABLE competances DROP name, DROP logo');
        $this->addSql('DROP INDEX UNIQ_B66FFE9262E35A ON cv');
        $this->addSql('ALTER TABLE cv DROP niv_exp_id, DROP statut, CHANGE photo_avatar photo_avatar VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE experiences DROP name, DROP date_debut, DROP date_fin, DROP entreprise, DROP poste, DROP description');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFCFE419E2');
        $this->addSql('DROP INDEX IDX_404021BFCFE419E2 ON formation');
        $this->addSql('ALTER TABLE formation DROP cv_id, DROP description, CHANGE date_fin date_fin DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE framework_logiciel CHANGE logo logo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE hobbie DROP name, DROP logo');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EECFE419E2');
        $this->addSql('DROP INDEX IDX_2FB3D0EECFE419E2 ON project');
        $this->addSql('ALTER TABLE project DROP cv_id');
        $this->addSql('ALTER TABLE reseaux_sociaux CHANGE logo logo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE techno DROP name, DROP logo');
        $this->addSql('ALTER TABLE user DROP firstname, DROP lastname, CHANGE api_token api_token VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE edited_at edited_at DATETIME DEFAULT \'NULL\'');
    }
}
