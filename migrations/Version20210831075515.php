<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210831075515 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, motscles LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, annonce_id_id INT DEFAULT NULL, user_id_id INT DEFAULT NULL, commentaire LONGTEXT DEFAULT NULL, date_enregistrement DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_67F068BC68C955C8 (annonce_id_id), INDEX IDX_67F068BC9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, user1_id_id INT DEFAULT NULL, user2_id_id INT DEFAULT NULL, note INT DEFAULT NULL, avis LONGTEXT DEFAULT NULL, date_enregistrement DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_CFBDFA144BA75E4E (user1_id_id), INDEX IDX_CFBDFA147A4F44D3 (user2_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, annonce_id_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_14B7841868C955C8 (annonce_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC68C955C8 FOREIGN KEY (annonce_id_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA144BA75E4E FOREIGN KEY (user1_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA147A4F44D3 FOREIGN KEY (user2_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B7841868C955C8 FOREIGN KEY (annonce_id_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE photo');
        $this->addSql('ALTER TABLE user CHANGE roles roles VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
