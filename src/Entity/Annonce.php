<?php

namespace App\Entity;

use App\Entity\User;
use App\Entity\Photo;
use App\Entity\Categorie;
use App\Entity\Commentaire;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
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

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="annonces")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="annonces")
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="annonce")
     */
    private $commentaires;

    /**
     * @ORM\OneToMany(targetEntity=Photo::class, mappedBy="annonce")
     */
    private $photos;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
        $this->photos = new ArrayCollection();
    }

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCategorie(): ?categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setAnnonce($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getAnnonce() === $this) {
                $commentaire->setAnnonce(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Photo[]
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos[] = $photo;
            $photo->setAnnonce($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getAnnonce() === $this) {
                $photo->setAnnonce(null);
            }
        }

        return $this;
    }

}
