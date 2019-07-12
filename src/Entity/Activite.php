<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActiviteRepository")
 */
class Activite
{
    const NOW = [
        0 => "Aujourd'hui",
        1 => "date de fin"
    ];
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $place;

    /**
     * @ORM\Column(type="text")
     */
    private $resume;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $dateDebut;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateDeFin;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default":true})
     */
    private $now;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Experience", cascade={"persist", "remove"})
     */
    private $idExperience;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Formation", cascade={"persist", "remove"})
     */
    private $idFormation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlace(): ?bool
    {
        return $this->place;
    }

    public function setPlace(?bool $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getNow(): ?bool
    {
        return $this->now;
    }

    public function setNow(?bool $now): self
    {
        $this->now = $now;

        return $this;
    }

    public function getidFormation(): ?Formation
    {
        return $this->idFormation;
    }
    public function setidFormation(?Formation $idFormation): self
    {
        $this->idFormation = $idFormation;
        return $this;
    }

    public function getIdExperience(): ?Experience
    {
        return $this->idExperience;
    }
    public function setIdExperience(?Experience $idExperience): self
    {
        $this->idExperience = $idExperience;
        return $this;
    }

    public function getDateDeFin(): ?\DateTimeInterface
    {
        return $this->dateDeFin;
    }

    public function setDateDeFin(?\DateTimeInterface $dateDeFin): self
    {
        $this->dateDeFin = $dateDeFin;

        return $this;
    }

    public function __toString()
    {
        return $this->idExperience.' '.$this->idFormation;
    }

}
