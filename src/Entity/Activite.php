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
        1 =>"date de fin"
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
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_debut = false;

    /**
     * @ORM\Column(type="boolean", options={"default":false})
     */
    private $now;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\experience", cascade={"persist", "remove"})
     */
    private $id_experience;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\formation", cascade={"persist", "remove"})
     */
    private $id_formation;

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
        return $this->date_debut;
    }

    public function setDateDebut(?\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

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

    public function getIdExperience(): ?experience
    {
        return $this->id_experience;
    }

    public function setIdExperience(?experience $id_experience): self
    {
        $this->id_experience = $id_experience;

        return $this;
    }

    public function getIdFormation(): ?formation
    {
        return $this->id_formation;
    }

    public function setIdFormation(?formation $id_formation): self
    {
        $this->id_formation = $id_formation;

        return $this;
    }
}
