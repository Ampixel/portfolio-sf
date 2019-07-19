<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190719133301 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE activite_experience');
        $this->addSql('DROP TABLE activite_formation');
        $this->addSql('ALTER TABLE activite CHANGE id_experience_id id_experience_id INT DEFAULT NULL, CHANGE id_formation_id id_formation_id INT DEFAULT NULL, CHANGE place place TINYINT(1) DEFAULT NULL, CHANGE date_de_fin date_de_fin DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE experience CHANGE entreprise entreprise VARCHAR(50) DEFAULT NULL, CHANGE poste poste VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE formation CHANGE titre titre VARCHAR(255) DEFAULT NULL, CHANGE ecole ecole VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE activite_experience (activite_id INT NOT NULL, experience_id INT NOT NULL, INDEX IDX_59605F7646E90E27 (experience_id), INDEX IDX_59605F769B0F88B1 (activite_id), PRIMARY KEY(activite_id, experience_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE activite_formation (activite_id INT NOT NULL, formation_id INT NOT NULL, INDEX IDX_3B450045200282E (formation_id), INDEX IDX_3B450049B0F88B1 (activite_id), PRIMARY KEY(activite_id, formation_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE activite_experience ADD CONSTRAINT FK_59605F7646E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activite_experience ADD CONSTRAINT FK_59605F769B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activite_formation ADD CONSTRAINT FK_3B450045200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activite_formation ADD CONSTRAINT FK_3B450049B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE activite CHANGE id_experience_id id_experience_id INT DEFAULT NULL, CHANGE id_formation_id id_formation_id INT DEFAULT NULL, CHANGE place place TINYINT(1) DEFAULT \'NULL\', CHANGE date_de_fin date_de_fin DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE experience CHANGE entreprise entreprise VARCHAR(50) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE poste poste VARCHAR(50) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE formation CHANGE titre titre VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE ecole ecole VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
