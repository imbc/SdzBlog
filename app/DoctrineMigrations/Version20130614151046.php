<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130614151046 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE comment DROP FOREIGN KEY FK_9474526C4B89032C");
        $this->addSql("DROP INDEX IDX_9474526C4B89032C ON comment");
        $this->addSql("ALTER TABLE comment ADD updated DATETIME NOT NULL, CHANGE post_id blog_id INT NOT NULL, CHANGE createdat created DATETIME NOT NULL");
        $this->addSql("ALTER TABLE comment ADD CONSTRAINT FK_9474526CDAE07E97 FOREIGN KEY (blog_id) REFERENCES post (id)");
        $this->addSql("CREATE INDEX IDX_9474526CDAE07E97 ON comment (blog_id)");
        $this->addSql("ALTER TABLE post ADD created DATETIME NOT NULL, ADD updated DATETIME NOT NULL, DROP createdAt, DROP updatedAt");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE comment DROP FOREIGN KEY FK_9474526CDAE07E97");
        $this->addSql("DROP INDEX IDX_9474526CDAE07E97 ON comment");
        $this->addSql("ALTER TABLE comment ADD createdAt DATETIME NOT NULL, DROP created, DROP updated, CHANGE blog_id post_id INT NOT NULL");
        $this->addSql("ALTER TABLE comment ADD CONSTRAINT FK_9474526C4B89032C FOREIGN KEY (post_id) REFERENCES post (id)");
        $this->addSql("CREATE INDEX IDX_9474526C4B89032C ON comment (post_id)");
        $this->addSql("ALTER TABLE post ADD createdAt DATETIME NOT NULL, ADD updatedAt DATETIME NOT NULL, DROP created, DROP updated");
    }
}
