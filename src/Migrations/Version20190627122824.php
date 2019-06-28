<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190627122824 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE activite (id INT AUTO_INCREMENT NOT NULL, id_experience_id INT DEFAULT NULL, id_formation_id INT DEFAULT NULL, place TINYINT(1) DEFAULT NULL, resume LONGTEXT NOT NULL, date_debut DATETIME DEFAULT NULL, now TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_B8755515F8C1DF42 (id_experience_id), UNIQUE INDEX UNIQ_B875551571C15D5C (id_formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B8755515F8C1DF42 FOREIGN KEY (id_experience_id) REFERENCES experience (id)');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B875551571C15D5C FOREIGN KEY (id_formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(50) DEFAULT NULL, CHANGE telephone telephone VARCHAR(50) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE activite');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(50) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE telephone telephone VARCHAR(50) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
