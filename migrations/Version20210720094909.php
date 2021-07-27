<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210720094909 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, rentals_id INT NOT NULL, makes_id INT NOT NULL, gears_id INT NOT NULL, engines_id INT NOT NULL, fleets_id INT NOT NULL, seats_id INT NOT NULL, registration_number VARCHAR(10) NOT NULL, price_per_day DOUBLE PRECISION NOT NULL, avaibality TINYINT(1) NOT NULL, INDEX IDX_773DE69DA564EA6A (rentals_id), INDEX IDX_773DE69DD06639A6 (makes_id), INDEX IDX_773DE69DC6B26989 (gears_id), INDEX IDX_773DE69D743D8A7 (engines_id), INDEX IDX_773DE69D235BF180 (fleets_id), INDEX IDX_773DE69DB103A3F8 (seats_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE engine (id INT AUTO_INCREMENT NOT NULL, engine_type VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fleet (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gear (id INT AUTO_INCREMENT NOT NULL, gear_box_type VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE make (id INT AUTO_INCREMENT NOT NULL, make_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rental (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, pick_up_date DATE NOT NULL, drop_off_date DATE NOT NULL, INDEX IDX_1619C27D67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seat (id INT AUTO_INCREMENT NOT NULL, seats SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, date_of_birth DATE NOT NULL, phone VARCHAR(14) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DA564EA6A FOREIGN KEY (rentals_id) REFERENCES rental (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DD06639A6 FOREIGN KEY (makes_id) REFERENCES make (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DC6B26989 FOREIGN KEY (gears_id) REFERENCES gear (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D743D8A7 FOREIGN KEY (engines_id) REFERENCES engine (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D235BF180 FOREIGN KEY (fleets_id) REFERENCES fleet (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DB103A3F8 FOREIGN KEY (seats_id) REFERENCES seat (id)');
        $this->addSql('ALTER TABLE rental ADD CONSTRAINT FK_1619C27D67B3B43D FOREIGN KEY (users_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D743D8A7');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D235BF180');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DC6B26989');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DD06639A6');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DA564EA6A');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DB103A3F8');
        $this->addSql('ALTER TABLE rental DROP FOREIGN KEY FK_1619C27D67B3B43D');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE engine');
        $this->addSql('DROP TABLE fleet');
        $this->addSql('DROP TABLE gear');
        $this->addSql('DROP TABLE make');
        $this->addSql('DROP TABLE rental');
        $this->addSql('DROP TABLE seat');
        $this->addSql('DROP TABLE `user`');
    }
}
