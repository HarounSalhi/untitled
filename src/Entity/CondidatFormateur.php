<?php

namespace App\Entity;

use App\Repository\CondidatFormateurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CondidatFormateurRepository::class)
 */
class CondidatFormateur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $condidat_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $formateur_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCondidatId(): ?int
    {
        return $this->condidat_id;
    }

    public function setCondidatId(int $condidat_id): self
    {
        $this->condidat_id = $condidat_id;

        return $this;
    }

    public function getFormateurId(): ?int
    {
        return $this->formateur_id;
    }

    public function setFormateurId(int $formateur_id): self
    {
        $this->formateur_id = $formateur_id;

        return $this;
    }
}
