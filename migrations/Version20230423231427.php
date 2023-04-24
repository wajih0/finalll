<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230423231427 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraisonuser ADD livreur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livraisonuser ADD CONSTRAINT FK_E0A6279CF8646701 FOREIGN KEY (livreur_id) REFERENCES livreur (id)');
        $this->addSql('CREATE INDEX IDX_E0A6279CF8646701 ON livraisonuser (livreur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraisonuser DROP FOREIGN KEY FK_E0A6279CF8646701');
        $this->addSql('DROP INDEX IDX_E0A6279CF8646701 ON livraisonuser');
        $this->addSql('ALTER TABLE livraisonuser DROP livreur_id');
    }
}
