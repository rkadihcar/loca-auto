<?php

namespace App\Entity;

use App\Repository\RentalRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=RentalRepository::class)
 */
class Rental
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\Type("\DateTimeInterface")
     * @var string A "d-M-Y" formatted value
     */
    private $pickUpDate;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\Type("\DateTimeInterface")
     * @var string A "d-M-Y" formatted value
     */
    private $dropOffDate;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity=Car::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $cars;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPickUpDate(): ?\DateTimeInterface
    {
        return $this->pickUpDate;
    }

    public function setPickUpDate(\DateTimeInterface $pickUpDate): self
    {
        $this->pickUpDate = $pickUpDate;

        return $this;
    }

    public function getDropOffDate(): ?\DateTimeInterface
    {
        return $this->dropOffDate;
    }

    public function setDropOffDate(\DateTimeInterface $dropOffDate): self
    {
        $this->dropOffDate = $dropOffDate;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

        return $this;
    }

    public function getCars(): ?Car
    {
        return $this->cars;
    }

    public function setCars(?Car $cars): self
    {
        $this->cars = $cars;

        return $this;
    }
 
}
