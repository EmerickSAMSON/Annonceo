<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210901124710 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce ADD user_id INT DEFAULT NULL, ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_F65593E5A76ED395 ON annonce (user_id)');
        $this->addSql('CREATE INDEX IDX_F65593E5BCF5E72D ON annonce (categorie_id)');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC68C955C8');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC9D86650F');
        $this->addSql('DROP INDEX IDX_67F068BC68C955C8 ON commentaire');
        $this->addSql('DROP INDEX IDX_67F068BC9D86650F ON commentaire');
        $this->addSql('ALTER TABLE commentaire ADD user_id INT DEFAULT NULL, ADD annonce_id INT DEFAULT NULL, DROP annonce_id_id, DROP user_id_id');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id)');
        $this->addSql('CREATE INDEX IDX_67F068BCA76ED395 ON commentaire (user_id)');
        $this->addSql('CREATE INDEX IDX_67F068BC8805AB2F ON commentaire (annonce_id)');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA144BA75E4E');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA147A4F44D3');
        $this->addSql('DROP INDEX IDX_CFBDFA144BA75E4E ON note');
        $this->addSql('DROP INDEX IDX_CFBDFA147A4F44D3 ON note');
        $this->addSql('ALTER TABLE note DROP user1_id_id, DROP user2_id_id');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B7841868C955C8');
        $this->addSql('DROP INDEX IDX_14B7841868C955C8 ON photo');
        $this->addSql('ALTER TABLE photo CHANGE annonce_id_id annonce_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784188805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id)');
        $this->addSql('CREATE INDEX IDX_14B784188805AB2F ON photo (annonce_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5A76ED395');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5BCF5E72D');
        $this->addSql('DROP INDEX IDX_F65593E5A76ED395 ON annonce');
        $this->addSql('DROP INDEX IDX_F65593E5BCF5E72D ON annonce');
        $this->addSql('ALTER TABLE annonce DROP user_id, DROP categorie_id');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA76ED395');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC8805AB2F');
        $this->addSql('DROP INDEX IDX_67F068BCA76ED395 ON commentaire');
        $this->addSql('DROP INDEX IDX_67F068BC8805AB2F ON commentaire');
        $this->addSql('ALTER TABLE commentaire ADD annonce_id_id INT DEFAULT NULL, ADD user_id_id INT DEFAULT NULL, DROP user_id, DROP annonce_id');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC68C955C8 FOREIGN KEY (annonce_id_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_67F068BC68C955C8 ON commentaire (annonce_id_id)');
        $this->addSql('CREATE INDEX IDX_67F068BC9D86650F ON commentaire (user_id_id)');
        $this->addSql('ALTER TABLE note ADD user1_id_id INT DEFAULT NULL, ADD user2_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA144BA75E4E FOREIGN KEY (user1_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA147A4F44D3 FOREIGN KEY (user2_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA144BA75E4E ON note (user1_id_id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA147A4F44D3 ON note (user2_id_id)');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784188805AB2F');
        $this->addSql('DROP INDEX IDX_14B784188805AB2F ON photo');
        $this->addSql('ALTER TABLE photo CHANGE annonce_id annonce_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B7841868C955C8 FOREIGN KEY (annonce_id_id) REFERENCES annonce (id)');
        $this->addSql('CREATE INDEX IDX_14B7841868C955C8 ON photo (annonce_id_id)');
    }
}
