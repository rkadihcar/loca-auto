<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;  
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 * @UniqueEntity(fields={"registrationNumber"}, message="Veuillez renseigner une plaque d'immatriculation valide") 
 * @Vich\Uploadable
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
     * @ORM\Column(name="registration_number",type="string", length=10)
     * @Assert\Regex(
     * pattern="/^[A-Z]{2}-\d{3}-[A-Z]{2}$/",
     * message="ytrez"
     * )
     */
    private $registrationNumber;

    /**
     * @ORM\Column(type="float")
     */
    private $pricePerDay;

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

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="cars_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

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

    public function __toString()
    {
        return $this->makes . ' ' . $this->registrationNumber . ' ' . $this->seats . ' places';
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImageFile($imageFile): self
    {
        $this->imageFile = $imageFile;

        return $this;
    }
}
