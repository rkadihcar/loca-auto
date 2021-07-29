<?php

namespace App\Entity;

use App\Repository\MakeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MakeRepository::class)
 */
class Make
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
    private $makeName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMakeName(): ?string
    {
        return $this->makeName;
    }

    public function setMakeName(string $makeName): self
    {
        $this->makeName = $makeName;

        return $this;
    }
    public function __toString()
    {
        return $this->makeName;
    }
}
