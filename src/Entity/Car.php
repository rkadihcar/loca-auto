<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $registrationNumber;

    /**
     * @ORM\Column(type="float")
     */
    private $pricePerDay;

    /**
     * @ORM\Column(type="boolean")
     */
    private $avaibality;

    /**
     * @ORM\ManyToOne(targetEntity=Rental::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $rentals;

    /**
     * @ORM\ManyToOne(targetEntity=Make::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $makes;

    /**
     * @ORM\ManyToOne(targetEntity=Gear::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $gears;

    /**
     * @ORM\ManyToOne(targetEntity=Engine::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $engines;

    /**
     * @ORM\ManyToOne(targetEntity=Fleet::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $fleets;

    /**
     * @ORM\ManyToOne(targetEntity=Seat::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $seats;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegistrationNumber(): ?string
    {
        return $this->registrationNumber;
    }

    public function setRegistrationNumber(string $registrationNumber): self
    {
        $this->registrationNumber = $registrationNumber;

        return $this;
    }

    public function getPricePerDay(): ?float
    {
        return $this->pricePerDay;
    }

    public function setPricePerDay(float $pricePerDay): self
    {
        $this->pricePerDay = $pricePerDay;

        return $this;
    }

    public function getAvaibality(): ?bool
    {
        return $this->avaibality;
    }

    public function setAvaibality(bool $avaibality): self
    {
        $this->avaibality = $avaibality;

        return $this;
    }

    public function getRentals(): ?Rental
    {
        return $this->rentals;
    }

    public function setRentals(?Rental $rentals): self
    {
        $this->rentals = $rentals;

        return $this;
    }

    public function getMakes(): ?Make
    {
        return $this->makes;
    }

    public function setMakes(?Make $makes): self
    {
        $this->makes = $makes;

        return $this;
    }

    public function getGears(): ?Gear
    {
        return $this->gears;
    }

    public function setGears(?Gear $gears): self
    {
        $this->gears = $gears;

        return $this;
    }

    public function getEngines(): ?Engine
    {
        return $this->engines;
    }

    public function setEngines(?Engine $engines): self
    {
        $this->engines = $engines;

        return $this;
    }

    public function getFleets(): ?Fleet
    {
        return $this->fleets;
    }

    public function setFleets(?Fleet $fleets): self
    {
        $this->fleets = $fleets;

        return $this;
    }

    public function getSeats(): ?Seat
    {
        return $this->seats;
    }

    public function setSeats(?Seat $seats): self
    {
        $this->seats = $seats;

        return $this;
    }
}
