<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20241213113343 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add user_id to booking table and adjust user table';
    }

    public function up(Schema $schema): void
    {
        // Ajout de la colonne user_id à la table booking si elle n'existe pas déjà
        if (!$this->isColumnExist($schema, 'booking', 'user_id')) {
            $this->addSql('ALTER TABLE booking ADD user_id INT NOT NULL');
        }

        // Création de la clé étrangère entre booking et user
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_E00CEDDEA76ED395 ON booking (user_id)');

        // Ajustements des colonnes de la table user
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE phone_number phone_number VARCHAR(20) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // Suppression de la clé étrangère et de la colonne user_id
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEA76ED395');
        $this->addSql('DROP INDEX IDX_E00CEDDEA76ED395 ON booking');
        $this->addSql('ALTER TABLE booking DROP COLUMN user_id');

        // Réversion des ajustements des colonnes de la table user
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`, CHANGE phone_number phone_number VARCHAR(10) NOT NULL');
    }

    private function isColumnExist(Schema $schema, string $tableName, string $columnName): bool
    {
        $table = $schema->getTable($tableName);
        return $table->hasColumn($columnName);
    }
}
