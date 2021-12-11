<?php

namespace App\Entity;

use App\Repository\AvisFormationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AvisFormationRepository::class)
 */
class AvisFormation
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
    private $formation_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $avis;

    public function __construct()
    {
    }

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

    public function getFormationId(): ?int
    {
        return $this->formation_id;
    }

    public function setFormationId(int $formation_id): self
    {
        $this->formation_id = $formation_id;

        return $this;
    }

    public function getAvis(): ?int
    {
        return $this->avis;
    }

    public function setAvis(int $avis): self
    {
        $this->avis = $avis;

        return $this;
    }
}
