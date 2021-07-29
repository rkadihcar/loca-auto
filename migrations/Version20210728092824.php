<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210728092824 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DA564EA6A');
        $this->addSql('DROP INDEX IDX_773DE69DA564EA6A ON car');
        $this->addSql('ALTER TABLE car DROP rentals_id');
        $this->addSql('ALTER TABLE rental ADD cars_id INT NOT NULL');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27D8702F506 FOREIGN KEY (cars_id) REFERENCES car (id)');
        $this->addSql('CREATE INDEX IDX_1619C27D8702F506 ON rental (cars_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car ADD rentals_id INT NOT NULL');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DA564EA6A FOREIGN KEY (rentals_id) REFERENCES rental (id)');
        $this->addSql('CREATE INDEX IDX_773DE69DA564EA6A ON car (rentals_id)');
        $this->addSql('ALTER TABLE rental DROP FOREIGN KEY FK_1619C27D8702F506');
        $this->addSql('DROP INDEX IDX_1619C27D8702F506 ON rental');
        $this->addSql('ALTER TABLE rental DROP cars_id');
    }
}
