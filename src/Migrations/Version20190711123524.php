<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190711123524 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE activite ADD date_de_fin DATETIME DEFAULT NULL, CHANGE entreprise_id entreprise_id INT DEFAULT NULL, CHANGE poste_id poste_id INT DEFAULT NULL, CHANGE ecole_id ecole_id INT DEFAULT NULL, CHANGE titre_id titre_id INT DEFAULT NULL, CHANGE place place TINYINT(1) DEFAULT NULL, CHANGE date_debut date_debut DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(50) DEFAULT NULL, CHANGE telephone telephone VARCHAR(50) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE activite DROP date_de_fin, CHANGE entreprise_id entreprise_id INT DEFAULT NULL, CHANGE poste_id poste_id INT DEFAULT NULL, CHANGE ecole_id ecole_id INT DEFAULT NULL, CHANGE titre_id titre_id INT DEFAULT NULL, CHANGE place place TINYINT(1) DEFAULT \'NULL\', CHANGE date_debut date_debut DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(50) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE telephone telephone VARCHAR(50) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
