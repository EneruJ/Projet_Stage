<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210510104841 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE document_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE type_document_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE document (id INT NOT NULL, id_user_id INT NOT NULL, titre VARCHAR(50) NOT NULL, resume VARCHAR(255) NOT NULL, priorite INT NOT NULL, date_poste DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D8698A7679F37AE5 ON document (id_user_id)');
        $this->addSql('CREATE TABLE type_document (id INT NOT NULL, designation_type VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A7679F37AE5 FOREIGN KEY (id_user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP INDEX uniq_8d93d64976158423');
        $this->addSql('CREATE INDEX IDX_8D93D64976158423 ON "user" (id_statut_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE document_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_document_id_seq CASCADE');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE type_document');
        $this->addSql('DROP INDEX IDX_8D93D64976158423');
        $this->addSql('ALTER TABLE "user" ALTER id_statut_id DROP NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX uniq_8d93d64976158423 ON "user" (id_statut_id)');
    }
}
