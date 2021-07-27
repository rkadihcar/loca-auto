<?php

namespace App\Entity;

use App\Repository\GearRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GearRepository::class)
 */
class Gear
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $gearBoxType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGearBoxType(): ?string
    {
        return $this->gearBoxType;
    }

    public function setGearBoxType(string $gearBoxType): self
    {
        $this->gearBoxType = $gearBoxType;

        return $this;
    }
}
