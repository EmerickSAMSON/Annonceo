<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 */
class Annonce
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="veuillez inserer un nom d'annonce")
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="veuillez inserer une courte description")
     * @Assert\Length(
     * min= 4,
     * max= 50,
     * minMessage="Vous devez entrer au moins 4 caractères",
     * maxMessage="Vous devez entrer 50 caractères maximum"
     * )
     */
    private $description_courte;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="veuillez inserer une description précise")
     *      * @Assert\Length(
     * min= 20,
     * minMessage="Vous devez entrer au moins 20 caractères",
     * )
     */
    private $description_longue;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="veuillez inserer un prix")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="veuillez renseigner votre adresse")
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="veuillez renseigner votre code postal")
     */
    private $cp;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="veuillez renseigner votre ville")
     */
    private $ville;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $dateAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescriptionCourte(): ?string
    {
        return $this->description_courte;
    }

    public function setDescriptionCourte(string $description_courte): self
    {
        $this->description_courte = $description_courte;

        return $this;
    }

    public function getDescriptionLongue(): ?string
    {
        return $this->description_longue;
    }

    public function setDescriptionLongue(string $description_longue): self
    {
        $this->description_longue = $description_longue;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getDateAt(): ?\DateTimeImmutable
    {
        return $this->dateAt;
    }

    public function setDateAt(\DateTimeImmutable $dateAt): self
    {
        $this->dateAt = $dateAt;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
