<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250328235900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create sales table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
            CREATE TABLE sales (
                id INT AUTO_INCREMENT NOT NULL,
                client_id INT NOT NULL,
                cursus_id INT DEFAULT NULL,
                lesson_id INT DEFAULT NULL,
                amount NUMERIC(10, 2) NOT NULL,
                created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)',
                updated_at DATETIME DEFAULT NULL,
                created_by_id INT NOT NULL,
                updated_by_id INT DEFAULT NULL,
                PRIMARY KEY(id),
                CONSTRAINT FK_CLIENT FOREIGN KEY (client_id) REFERENCES user (id),
                CONSTRAINT FK_CURSUS FOREIGN KEY (cursus_id) REFERENCES cursus (id),
                CONSTRAINT FK_LESSON FOREIGN KEY (lesson_id) REFERENCES lesson (id),
                CONSTRAINT FK_CREATED_BY FOREIGN KEY (created_by_id) REFERENCES user (id),
                CONSTRAINT FK_UPDATED_BY FOREIGN KEY (updated_by_id) REFERENCES user (id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE sales');
    }
}
