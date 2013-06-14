<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130614131321 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE posts_categories (post_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_A8C3AA464B89032C (post_id), INDEX IDX_A8C3AA4612469DE2 (category_id), PRIMARY KEY(post_id, category_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE posts_categories ADD CONSTRAINT FK_A8C3AA464B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE");
        $this->addSql("ALTER TABLE posts_categories ADD CONSTRAINT FK_A8C3AA4612469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE posts_categories DROP FOREIGN KEY FK_A8C3AA4612469DE2");
        $this->addSql("DROP TABLE posts_categories");
        $this->addSql("DROP TABLE category");
    }
}
