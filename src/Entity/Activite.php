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
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="boolean", options={"default":false})
     */
    private $now;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\experience", cascade={"persist", "remove"})
     */
    private $entreprise;
    /**
     * @ORM\OneToOne(targetEntity="App\Entity\experience", cascade={"persist", "remove"})
     */
    private $poste;
    /**
     * @ORM\OneToOne(targetEntity="App\Entity\formation", cascade={"persist", "remove"})
     */
    private $ecole;
    /**
     * @ORM\OneToOne(targetEntity="App\Entity\formation", cascade={"persist", "remove"})
     */
    private $titre;

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

    public function getEntreprise(): ?experience
    {
        return $this->entreprise;

    }

    public function setEntreprise(?experience $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getPoste(): ?experience
    {
        return $this->poste;

    }

    public function setPoste(?experience $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getEcole(): ?formation
    {
        return $this->ecole;
    }

    public function setEcole(?formation $ecole): self
    {
        $this->ecole = $ecole;

        return $this;
    }

    public function getTitre(): ?formation
    {
        return $this->titre;
    }

    public function setTitre(?formation $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

}
