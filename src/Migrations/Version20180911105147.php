<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180911105147 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE books (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, issue_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE books_work (books_id INT NOT NULL, work_id INT NOT NULL, INDEX IDX_70C7C8AF7DD8AC20 (books_id), INDEX IDX_70C7C8AFBB3453DB (work_id), PRIMARY KEY(books_id, work_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE books_work ADD CONSTRAINT FK_70C7C8AF7DD8AC20 FOREIGN KEY (books_id) REFERENCES books (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE books_work ADD CONSTRAINT FK_70C7C8AFBB3453DB FOREIGN KEY (work_id) REFERENCES work (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE books_work DROP FOREIGN KEY FK_70C7C8AF7DD8AC20');
        $this->addSql('DROP TABLE books');
        $this->addSql('DROP TABLE books_work');
    }
}
